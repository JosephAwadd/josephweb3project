<?php
    session_start();
    
    $userId = $_SESSION['userId'];
    $quantity=$_POST['quantity'];
    $id= $_POST['itemId'];
    $date = date("F j, Y, g:i a"); 

    $link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
    mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

    $getItemsById = "SELECT * FROM items WHERE `items`.`id` = '$id';";
    $getItemsByIdResult = mysqli_query($link , $getItemsById) or die("Query failed 1");

    while ($ItemFetchAssoc = mysqli_fetch_assoc($getItemsByIdResult)){

        if($ItemFetchAssoc['discountprice'] > 0){
            $price =$ItemFetchAssoc['discountprice'];
        }else{
            $price=$ItemFetchAssoc['price'];
        }     

        if(empty($quantity) || $quantity === 0){
            $idd = $ItemFetchAssoc['id'];
            header("Location:itemDetail.php?id=".$idd);
        }else{
            $finalPrice=$res = bcmul($quantity, $price);
            $itemCat=$ItemFetchAssoc['catname'];
            $itemName=$ItemFetchAssoc['name'];
            $image=$ItemFetchAssoc['image'];
            $reduceStock=bcsub($ItemFetchAssoc['stock'],$quantity);
            $insertQuery ="INSERT INTO `cart` (`userid`,`itemid`,`itemcat`,`name`,`quantity`,`price`,`image`,`date`) VALUES ('$userId','$id','$itemCat','$itemName','$quantity','$finalPrice','$image','$date')";
            $reduceStockQuery= "UPDATE `items` SET `stock` = '$reduceStock' WHERE `items`.`id` = '$id';";
            
            mysqli_query($link,$insertQuery);
            mysqli_query($link,$reduceStockQuery);

            header("Location:itemDetail.php?id=".$id);
        }
    }

    mysqli_close($link);
?>