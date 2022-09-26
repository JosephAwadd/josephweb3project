<?php

$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

if(isset($_POST['submit'])) {
    $photos = $_FILES['photo'];
    $total = count($photos['name']);
    $cat=$_POST["categorie"];
    $name=$_POST["name"];
    $desc=$_POST["description"];
    $price=$_POST["price"];
    $discountprice=$_POST["discountprice"];
    $stock=$_POST["stock"];
    $date = date_create(date("F j, Y")); 

    for ($i = 0; $i < $total; $i++){
        $size = $photos['size'][$i];
        $type = $photos['type'][$i];
        $extension = explode('.', strtolower($photos['name'][$i]))[1];
        if (($type != "image/jpeg" && $type != "image/png" && $type != "image/jpg"&& $type != "image/webp")) {
            header('location:items.php');
        } else {
            $new_name = base64_encode(date("YY-MM-DD hh:mm:ss") . $photos['name'][$i]);
            move_uploaded_file($photos['tmp_name'][$i], "../web3/itemimages/" . $new_name . "." . $extension);
            $fullName = $new_name . "." . $extension;
        }
    }

    if(empty($cat)||empty($name)||empty($desc)||empty($price)){
        header('location:items.php');
        }
        else{
            $query= mysqli_query($link,"INSERT INTO `items` (`catname`, `name`, `description`,`price`,`discountprice`,`stock`,`image`,`date`) VALUES ('$cat','$name','$desc','$price','$discountprice','$stock','$fullName','$date')");
            header('location:items.php');
        }
}

    mysqli_close($link);

?>