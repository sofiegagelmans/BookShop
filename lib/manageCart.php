<?php

session_start();

$sending_form_uri = $_SERVER['HTTP_REFERER'];

//checken of de "session cart" bestaat en
// Zoniet, maak een nieuwe sessie aan en zet gelijk een een lege array
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
//gaat altijd true zijn
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cartId = $_POST['bookId'];
    $cartquantity = $_POST['quantity'];

    //controleren of "session cart cart id" al bestaat
    if (!isset($_SESSION['cart']["$cartId"])) {
        $_SESSION['cart']["$cartId"] = $cartquantity;
    } else {
        if ($cartquantity > 0) {
            if (isset($_SESSION['cart']["$cartId"])) {
                $_SESSION['cart']["$cartId"] += $cartquantity;
            }
            else {
                $_SESSION['cart']["$cartId"] = $cartquantity;
            }
        } else {
            if ($cartquantity < 0) {
                if (isset($_SESSION['cart']["$cartId"]) and ($_SESSION['cart']["$cartId"]) + $cartquantity > 0) {
                    $_SESSION['cart']["$cartId"] += $cartquantity;
                }
                if (isset($_SESSION['cart']["$cartId"]) and ($_SESSION['cart']["$cartId"]) + $cartquantity <= 0) {
                    unset($_SESSION['cart']["$cartId"]);
                }
            }
        }
    }
}



header("Location: " . $sending_form_uri); // dit stuurt je terug naar de pagina waar je op zat