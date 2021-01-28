<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$public_access = true;
require_once "autoload.php";

SaveFormData();

function SaveFormData() {

    global $app_root;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        //controle CSRF token
        //if (!key_exists("csrf", $_POST)) die("Missing CSRF");
        //if (!hash_equals($_POST['csrf'], $_SESSION['lastest_csrf'])) die("Problem with CSRF");

        $_SESSION['lastest_csrf'] = "";

        //sanitisatie
        $_POST = StripSpaces($_POST);
        $_POST = ConvertSpecialChars($_POST);

        $table = $pkey = $update = $insert = $where = $str_keys_values = "";

        //belangrijke metadata
        if (!key_exists("table", $_POST)) die("Missing table");
        if (!key_exists("pkey", $_POST)) die("Missing pkey");

        $table = $_POST['table'];
        $pkey = $_POST['pkey'];

        //insert of update
        if (key_exists("$pkey", $_POST) and $_POST["$pkey"] > 0 ){$update = true;}
        else {
            $insert = true;
        }

        //validation
        $sending_form_uri = $_SERVER['HTTP_REFERER'];
        CompareWithDatabase( $table, $pkey );

        //validaties voor het registratieformulier
        if ($table == "Customer" AND $insert) {

            ValidateUsrPassword( $_POST['cus_password'] );
            ValidateUsrEmail( $_POST['cus_email'] );
            CheckUniqueUsrEmail( $_POST['cus_email'] );

        }

        //terugkeren naar de afzender als er een fout is
        if (isset($_SESSION['errors']) AND count($_SESSION['errors']) > 0) {
            $_SESSION['OLD_POST'] = $_POST;
            header( "Location: " . $sending_form_uri ); exit();
        }

        if ($update) $sql = "UPDATE $table SET ";
        if ($insert) $sql = "INSERT INTO $table SET ";

        $keys_values = [];

        foreach ($_POST as $field => $value) {

            if (in_array($field, ['table', 'pkey', 'afterinsert', 'afterupdate', 'csrf'])) continue;

            if ($field == $pkey) {
                if ($update) $where = " WHERE $pkey = $value ";
                continue;
            }

            if ($field == "cus_password") {
                $value = password_hash( $value, PASSWORD_BCRYPT);
                $keys_values[] = " $field = '$value' " ;

                $_SESSION['msgs'][] = "Bedankt voor uw registratie";
            } else {
                $keys_values[] = " $field = '$value' " ;
            }
        }

        $str_keys_values = implode(" , ", $keys_values);

        $sql .= $str_keys_values;

        $sql .= $where;

        ExecuteSQL($sql);

        //omleiden na invoegen of bijwerken
        if ($insert AND $_POST["afterinsert"] > "") header("Location: ../" . $_POST["afterinsert"]);
        if ($update AND $_POST["afterupdate"] > "") header("Location: ../" . $_POST["afterupdate"]);
    }
}