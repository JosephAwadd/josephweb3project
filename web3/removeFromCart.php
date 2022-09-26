<!-- DELETE FROM `cart` WHERE `cart`.`userId` ='1' AND `cart`.`itemid` ='1' -->
<?php 
session_start();

if($_GET){
    $id=$_GET['id'];
}

$userId= $_SESSION['userId'];

$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

mysqli_query($link,"DELETE FROM `cart` WHERE `cart`.`userId` ='$userId' AND `cart`.`itemid` ='$id'");
header("Location:myCart.php")

?>