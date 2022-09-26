<?php 
session_start();

$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

$itemId=$_SESSION['favoriteItem'];

mysqli_query($link,"DELETE FROM favorite WHERE `favorite`.`itemid` = '$itemId';");

?>