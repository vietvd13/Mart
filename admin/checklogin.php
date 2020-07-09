<?php
session_start();

if(!isset($_SESSION['user_us']) && !isset($_SESSION['user_pw'])){
    header("Location: index.php");
}

?>