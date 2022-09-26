<?php
    session_start();

    $userId=$_SESSION['userId'];
    $adress=$_SESSION['userAdress'];
    $email=$_SESSION['userEmail'];
    $fullName=$_SESSION['userFirstName']." ".$_SESSION['userLastName'];
    $date = date("F j, Y"); 

    $link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
    mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");


    if(empty($userId) || empty($adress) || empty($email) || empty($fullName)){
        header("Location:myCart.php");
    }else{
        $sendOrderQuery="INSERT INTO `order` (`userid`,`adress`,`email`,`name`,`date`) VALUES ('$userId','$adress','$email','$fullName','$date')";
        mysqli_query($link,$sendOrderQuery);

        $sendOrderItemsQuery="INSERT INTO `orderitem` (`userid` ,`itemid`,`itemcat`,`name`,`price`,`quantity`,`date`) SELECT `userId`,`itemid`,`itemcat`,`name`,`price`,`quantity`,'$date' FROM `cart` WHERE cart.userId='$userId'";
        mysqli_query($link,$sendOrderItemsQuery);

        $deleteCart="DELETE FROM cart WHERE cart.userid='$userId'"; 
        mysqli_query($link,$deleteCart);

        header("Location:checkoutOrderSuccess.php");
    }

?>