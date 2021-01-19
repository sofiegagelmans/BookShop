<?php
session_start();

require_once "connection_data.php";
require_once "pdo.php";
require_once "html_functions.php";
//require_once "form_elements.php";
//require_once "sanitize.php";
require_once "validate.php";
//require_once "reg.php";
//require_once "auth.php";
//require_once "security.php";

//$errors = [];
//
//if ( key_exists( 'errors', $_SESSION ) AND is_array( $_SESSION['errors']) )
//{
//    $errors = $_SESSION['errors'];
//    $_SESSION['errors'] = null;
//}
//
//
//$message = [];
//
//if (key_exists( 'message', $_SESSION) AND is_array( $_SESSION['message'])) {
//    $message = $_SESSION['message'];
//    $_SESSION['message'] = null;
//}
