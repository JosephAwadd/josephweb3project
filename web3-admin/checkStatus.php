<?php
    if($_GET){
        $id=$_GET['id'];
    }
    if(!$id){
        header("Location:orders.php");
    }else{
        $link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
        mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

        $sendOrderItemsQuery="INSERT INTO `orderitemarchive` (`userid` ,`itemid`,`itemcat`,`name`,`price`,`quantity`,`date`) SELECT `userId`,`itemid`,`itemcat`,`name`,`price`,`quantity`,`date` FROM `orderitem` WHERE orderitem.userId='$id'";
        mysqli_query($link,$sendOrderItemsQuery);

        $deleteOrderItem="DELETE FROM orderitem WHERE orderitem.userid='$id'"; 
        mysqli_query($link,$deleteOrderItem);

        $deleteOrder="DELETE FROM `order` WHERE `order`.`userid`='$id'"; 
        mysqli_query($link,$deleteOrder);

        // mysqli_query($link,"UPDATE `order` SET `status`='1' WHERE `order`.`id`='$id';");
        header("Location:orders.php");

    }

?>