<?php

session_start();

$sending_form_uri = $_SERVER['HTTP_REFERER'];

//controleren of de sessie al bestaat
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cartId = $_POST['bookId'];
    $cartquantity = $_POST['quantity'];

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
                elseif (isset($_SESSION['cart']["$cartId"]) and ($_SESSION['cart']["$cartId"]) + $cartquantity <= 0) {
                    unset($_SESSION['cart']["$cartId"]);
                }
            }
        }
    }
}

header("Location: " . $sending_form_uri); // dit stuurt je terug naar de pagina waar je op zat