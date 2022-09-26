<?php 
    session_start();
    $userId=$_POST['userId'];
    unset($_SESSION[$userId]);
?>