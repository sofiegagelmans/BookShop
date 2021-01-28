<?php

require_once "autoload.php";

function CreateConnection() {

    //globaal
    global $conn;
    global $servername, $dbname, $username, $password;

    //creeër en controleer de connectie
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function GetData($sql) {
    //globaal
    global $conn;

    CreateConnection();

    //query definiëren en uitvoeren
    $result = $conn->query($sql);

    //toon het resultaat als er een resultaat is
    if ($result->rowCount() > 0) {
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        //$rows = $result->fetchAll(PDO::FETCH_NUM);
        //$rows = $result->fetchAll(PDO::FETCH_BOTH);

        return $rows;
    } else {
        return [];
    }
}

function ExecuteSQL($sql) {

    global $conn;

    CreateConnection();

    //query definiëren en uitvoeren
    $result = $conn->query($sql);

    return $result;
}
