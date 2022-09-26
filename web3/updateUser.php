<?php 

$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

if($_GET){
    $id = $_GET['id'];
  } 

$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$username=$_POST["username"];
$email=$_POST["email"];
$adress=$_POST["adress"];

if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($adress)){
    header('location:myProfile.php');
}else{
  $query = "UPDATE `users` SET `firstname` = '$firstname', `lastname` = '$lastname', `username` = '$username', `email` = '$email', `adress` = '$adress' WHERE `users`.`id` = '$id';";
  mysqli_query($link,$query);
  header("Location:myProfile.php?id=".$id);
}

?>