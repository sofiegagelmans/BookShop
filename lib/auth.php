<?php

require_once "autoload.php";
$email = filter_var(trim( $_POST['cus_email']), FILTER_SANITIZE_EMAIL);

$pwd = filter_var(trim( $_POST['cus_password']), FILTER_SANITIZE_STRING);



//$pwd = md5($pwd."asdfghjkl123");

$user= GetData("SELECT * FROM `Customer` WHERE 'cus_email' = $email");
//passworver

//$user = $result->fetch_assoc();

if(count($user) == 0){
    echo "User not found";
//    exec();
}
print_r($user);
//exit();

//setcookie('customer', $email['name'], time() + 3600, "/");


header('Location: ../index.php');


