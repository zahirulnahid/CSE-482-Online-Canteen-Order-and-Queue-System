<?php
session_start();
//(ADMIN)

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
    //auth or send to login page
} else
    include('connection.php');
?>