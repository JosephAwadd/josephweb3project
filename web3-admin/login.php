<?php
session_start();

$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

$em=$_POST["email"];
$pass=$_POST["password"];

$q="SELECT * FROM `admins`";

$res=mysqli_query($link,$q);
$a=array();

if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res)){
        $a[]=$row;
    }

for($i=0;$i<count($a);$i++){

    if($a[$i]["email"]==$em && password_verify($pass,$a[$i]["password"])){
        header('location:categories.php');
        $_SESSION["adminId"]=$array[$i]["id"] ;

        break 1;
    }else{
        header('location:Login.html');
       }
}
}
else{
     header('location:Login.html');
    }
    
mysqli_close($link);
?>