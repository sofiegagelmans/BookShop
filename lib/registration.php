<?php
require_once "autoload.php";

//ExecuteSQL("INSERT INTO `User` (`email`,`pass`) VALUES ('$email','$pwd')");
$email = filter_var(trim( $_POST['cus_email']), FILTER_SANITIZE_EMAIL);

$pwd = filter_var(trim( $_POST[ 'cus_password']), FILTER_SANITIZE_STRING);

if(mb_strlen($email) < 8 || mb_strlen($email) > 50) {
    echo "Length of email is not correct";
    exit();
} else if( mb_strlen($pwd) < 6 ){
    echo "Length of password is not correct, must be more then 6 characters";
    exit();
}
$pwd = md5($pwd."asdfghjkl123");

ExecuteSQL("INSERT INTO `Customer` (`cus_email`,`cus_password`) VALUES ('$email','$pwd')");


header('Location: ../user_information.php');









////$r_pwd = trim( $_POST[ 'r_pwd']);
//
//
//
//
//
//
////&& !empty($r_pwd)
//if( !empty($login) && !empty($pwd) ){
//    global $conn;
//    CreateConnection();
//
//    $sql = "INSERT INTO Postalcode(pos_code, pos_city)  VALUES(:email, :pwd)";
//
//    $params = [ ':email' => $email, ':pwd' => $pwd];
//
//    $stmt = $conn->prepare($sql);
//    $stmt->execute($params);
//
//echo 'You are succesfull registrated';
//}
//else{
//    echo 'Please fill in all fields';
//}