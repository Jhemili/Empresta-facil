<?php 
if (!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['user'])){
    die(header("location: login.php"));
}
?>