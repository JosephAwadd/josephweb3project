<?php
$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");


$fn=$_POST["firstName"];
$ln=$_POST["lastName"];
$em=$_POST["email"];
$pass=$_POST["password"];

$passHashed=password_hash($pass,PASSWORD_DEFAULT);
if(empty($fn)||empty($ln)||empty($em)||empty($pass)){
header('location:CreateAccount.html');
}
else{
    $pass=$_POST["password"];
    $query= mysqli_query($link,"INSERT INTO `admins` (`first name`, `last name`, `email`, `password`) VALUES ('$fn','$ln','$em','$passHashed')");
    header('location:Login.html');
}
mysqli_close($link);
?>