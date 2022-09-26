<?php
$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

if($_GET){
    $delete = $_GET['delete'];
  } 

if(isset($_POST['submit'])){

    mysqli_query($link,"DELETE FROM items WHERE `items`.`id` = '$delete';");
    header('location:items.php');
}
else{
    header('location:items.php');
}

?>