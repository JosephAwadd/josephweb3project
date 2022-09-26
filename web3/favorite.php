<?php
session_start();

$itemId=$_SESSION['itemId'];
$userId=$_SESSION['userId'];


$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

$getItemsById = "SELECT * FROM items WHERE `items`.`id` = '$itemId';";
$getItemsByIdResult = mysqli_query($link , $getItemsById) or die("Query failed");

if(empty($itemId)){
    header("Location:itemDetail.php?id=".$itemId);
}else{
    while ($ItemFetchAssoc = mysqli_fetch_assoc($getItemsByIdResult)){

        $catname=$ItemFetchAssoc['catname'];
        $name=$ItemFetchAssoc['name'];
        $description=$ItemFetchAssoc['description'];
        $price=$ItemFetchAssoc['price'];
        $image=$ItemFetchAssoc['image'];


        $_SESSION['favoriteItem'] = $ItemFetchAssoc['id'];

        $sendFavoriteQuery="INSERT INTO `favorite` (`userid`,`itemid`,`catname`,`name`,`description`,`price`,`image`) VALUES ('$userId','$itemId','$catname','$name','$description','$price','$image')";
        mysqli_query($link,$sendFavoriteQuery);

    }
}

?>