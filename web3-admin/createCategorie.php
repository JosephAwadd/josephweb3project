<?php
$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

$name=$_POST["name"];

if(empty($name)){
    header('location:categories.php');
}
else{
    $query= mysqli_query($link,"INSERT INTO `categories` (`name`) VALUES ('$name')");
    header('location:categories.php');
}

?>
<?php 
mysqli_close($link);
?>