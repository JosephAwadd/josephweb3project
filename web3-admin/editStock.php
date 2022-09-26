<?php
$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

$stock=$_POST["stock"];

if($_GET){
  $id = $_GET['id'];
} 

if(empty($stock) < 0){
    header('location:items.php');
}
else{
    $query= mysqli_query($link,"UPDATE `items` SET `stock` = '$stock' WHERE `items`.`id` = '$id';");
    header('location:items.php');
}

?>
<?php 
mysqli_close($link);
?>