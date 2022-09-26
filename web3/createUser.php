<?php
$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$username=$_POST["username"];
$email=$_POST["email"];
$adress=$_POST["adress"];
$password=$_POST["password"];

$passwordHashed=password_hash($password,PASSWORD_DEFAULT);
if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($adress) || empty($password)){
    header('location:signup.php');
}else{
    $query ="INSERT INTO `users` (`firstname`, `lastname`, `username`, `email`, `adress`, `password`) VALUES ('$firstname', '$lastname', '$username', '$email', '$adress', '$passwordHashed')";
    mysqli_query($link,$query);
    header('location:signin.php');
}

mysqli_close($link);
?>

