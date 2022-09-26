<?php
$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

if($_GET){
    $delete = $_GET['delete'];
  } 

if(isset($_POST['submit'])){

    mysqli_query($link,"DELETE FROM categories WHERE `categories`.`idCat` = '$delete';");
    header('location:categories.php');
}
else{
    header('location:categories.php');
}

?>