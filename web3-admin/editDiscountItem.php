<?php
$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

$discountPrice=$_POST["discountprice"];

if($_GET){
    $id = $_GET['id'];
  } 
  
if($_POST['submit']){

    $query= mysqli_query($link,"UPDATE `items` SET `discountprice` = '$discountPrice' WHERE `items`.`id` = '$id';");
    header('location:items.php');
}else{
    header('location:categories.php');
}

?>
<?php 
mysqli_close($link);
?>