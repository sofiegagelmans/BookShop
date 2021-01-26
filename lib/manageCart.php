<?php

session_start();

$sending_form_uri = $_SERVER['HTTP_REFERER'];

//checked of de ($_SESSION['cart']) bestaat en maakt een nieuwe session aan als ze niet bestaat en zet ze gelijk aan een lege array
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
//gaat altijd true zijn (voor security zie safe.php -> steven)
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cartBook = $_POST['bookname'];
    $cartquantity = $_POST['quantity'];

    //controleren of ($_SESSION['cart'][$cartBook]) bestaat
    if (!isset($_SESSION['cart']["$cartBook"])) {
        $_SESSION['cart']["$cartBook"] = $cartquantity;
    } if ($cartquantity > 0) {
        if (isset($_SESSION['cart']["$cartBook"])) {
            $_SESSION['cart']["$cartBook"] = $cartquantity;
        }
        else {
            $_SESSION['cart']["$cartBook"] = $cartquantity;
        }
    } else {
        if ($cartquantity < 0) {
            if (isset($_SESSION['cart']["$cartBook"]) and ($_SESSION['cart']["$cartBook"]) + $cartquantity > 0) {
                $_SESSION['cart']["$cartBook"] += $cartquantity;
            }
            if (isset($_SESSION['cart']["$cartBook"]) and ($_SESSION['cart']["$cartBook"]) + $cartquantity <= 0) {
                unset($_SESSION['cart']["$cartBook"]);
            }
        }
    }
}



header("Location: " . $sending_form_uri); // dit stuurt je terug naar de pagina waar je op zat