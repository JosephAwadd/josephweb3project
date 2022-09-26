<?php
$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

$price=$_POST["price"];

if($_GET){
  $id = $_GET['id'];
} 

if(empty($price)){
    header('location:items.php');
}
else{
    $query= mysqli_query($link,"UPDATE `items` SET `price` = '$price' WHERE `items`.`id` = '$id';");
    header('location:items.php');
}

?>
<?php 
mysqli_close($link);
?>