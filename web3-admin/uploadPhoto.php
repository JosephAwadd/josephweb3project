<?php
$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

if(isset($_POST['submit'])) {
    $photos = $_FILES['photo'];
    $total = count($photos['name']);
    for ($i = 0; $i < $total; $i++){
        $size = $photos['size'][$i];
        $type = $photos['type'][$i];
        $extension = explode('.', strtolower($photos['name'][$i]))[1];
        if (($type != "image/jpeg" && $type != "image/png" && $type != "image/jpg")) {
			$msg = htmlspecialchars('Image must be .jpeg or .png or .jpg');
            header("Location:./welcomeImage.php?msg=".$msg);
        } else {
            $new_name = base64_encode(date("YY-MM-DD hh:mm:ss") . $photos['name'][$i]);
            move_uploaded_file($photos['tmp_name'][$i], "../web3/welcomeimage/" . $new_name . "." . $extension);
            $fullName = $new_name . "." . $extension;
            mysqli_query($link,"UPDATE `welcomeimage` SET `url` = '$fullName' WHERE `welcomeimage`.`id` = 1;");
			header("Location:./welcomeImage.php");
        }
    }
}
?>

