<?php
session_start();


if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    $cookie_name = "token";
   if(!isset($_COOKIE[$cookie_name])) header("location: login.php");
   else header("location: index.php");
    exit;
    //auth or send to login page
} else
    include('connection.php');
?>