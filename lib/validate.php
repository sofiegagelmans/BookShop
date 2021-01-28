<?php
require_once "autoload.php";

function CompareWithDatabase($table, $pkey): void {
    $data = GetData("SHOW FULL COLUMNS FROM $table");

    //overloop alle gedefinieerde velden van de tabel in de databank
    foreach ($data as $row) {

        //haal de veldnaam en het veldtype uit de databank
        $fieldname = $row['Field'];
        $can_be_null = $row['Null'];

        list($type, $length, $precision) = GetFieldType( $row['Type']);

        if (key_exists($fieldname, $_POST)) {
            $sent_value = $_POST[$fieldname];

            if (in_array($type, explode("," , "INTEGER,INT,SMALLINT,TINYINT,MEDIUMINT,BIGINT"))) {

                if (!isInt($sent_value)) {
                    $msg = $sent_value . " moet een geheel getal zijn";
                    $_SESSION['errors'][ "$fieldname" . "_error" ] = $msg;
                } else {
                    $_POST[$fieldname] = (int) $sent_value;
                }
            }

            if (in_array($type, explode("," , "FLOAT,DOUBLE" ))) {

                if (!is_numeric($sent_value)) {
                    $msg = $sent_value . " moet een getal zijn (eventueel met decimalen)";
                    $_SESSION['errors']["$fieldname" . "_error"] = $msg;
                } else {
                    $_POST[$fieldname] = (float) $sent_value;
                }
            }

            if (in_array($type, explode("," , "VARCHAR,TEXT"))) {

                if (strlen($sent_value) > $length or strlen($sent_value) == 0) {
                    $msg = "Dit veld moet minstens 1 of kan maximum $length tekens bevatten";
                    $_SESSION['errors']["$fieldname" . "_error"] = $msg;
                }
            }

            if ($type == "DATE") {

                if (!isDate( $sent_value)) {
                    $msg = $sent_value . " is geen geldige datum";
                    $_SESSION['errors'][ "$fieldname" . "_error" ] = $msg;
                }
            }
        }
    }
}

function ValidateUsrPassword($password) {

    if (strlen($password) < 8) {
        $_SESSION['errors']['cus_password_error'] = "Het wachtwoord moet minstens 8 tekens bevatten";
        return false;
    }
    return true;
}

function ValidateUsrEmail($email) {

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        $_SESSION['errors']['usr_email_error'] = "Geen geldig e-mailadres!";
        return false;
    }
}

function CheckUniqueUsrEmail($email) {
    $sql = "SELECT * FROM Customer WHERE cus_email='" . $email . "'";
    $rows = GetData($sql);

    if (count($rows) > 0) {
        $_SESSION['errors']['cus_email_error'] = "Er bestaat al een gebruiker met dit e-mailadres";
        return false;
    }
    return true;
}

function isInt($value) {
    return is_numeric($value) && floatval(intval($value)) === floatval($value);
}

function isDate($date) {
    return date('Y-m-d', strtotime($date)) === $date;
}

function GetFieldType($definition) {
    $length = 40;
    $precision = 0;

    if (strpos($definition, "(") !== false) {
        $type_parts = explode("(", $definition);
        $type = $type_parts[0];
        $between_brackets = str_replace(")", "", $type_parts[1]);

        if (strpos($between_brackets, ",") !== false) {
            list($length, $precision) = explode(",", $between_brackets);
        }
        else $length = (int) $between_brackets;
    }
    else $type = $definition;

    $type = strtoupper($type);

    return [$type, $length, $precision];
}