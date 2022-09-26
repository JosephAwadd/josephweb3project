<?php
session_start();
$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

$username=$_POST['username'];
$password=$_POST['password'];

$query="SELECT * FROM `users`";
$result=mysqli_query($link,$query);
$array=array();

if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $array[]=$row;
    }
    for($i=0;$i<count($array);$i++){

        if($array[$i]["username"]==$username && password_verify($password,$array[$i]["password"])){
            $_SESSION["userId"]=$array[$i]["id"] ;
            $_SESSION["userFirstName"]=$array[$i]["firstname"] ;
            $_SESSION["userLastName"]=$array[$i]["lastname"] ;
            $_SESSION["userName"]=$array[$i]["username"] ;
            $_SESSION["userEmail"]=$array[$i]["email"] ;
            $_SESSION["userAdress"]=$array[$i]["adress"] ;

            header('location:homepage.php');
            break 1;
        }else{
            header('location:signin.php');
           }
    }
}
else{
    header('location:signin.php');
   }

   mysqli_close($link);
?>