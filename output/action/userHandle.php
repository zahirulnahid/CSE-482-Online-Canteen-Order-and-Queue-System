<?php
include("../protection.php");
include('../connection.php');
//account approve
if($_GET["action"]=="approve"){$email = $_GET["id"]; // get id through query string
$sql = "UPDATE `users` SET `verified`='true' WHERE `email`= '$email';";
$approveAccount = mysqli_query($conn, $sql); // update query

if ($approveAccount) {
    mysqli_close($conn); // Close connection
    header("location:../pendingAccount.php"); // redirects to manageAccount page
    exit;
} else {
    echo "Error updating record"; // display error message if not delete
}}
//account delete
if($_GET["action"]=="delete"){
$email = $_GET["id"]; // get id through query string

$deleteAccount = mysqli_query($conn, "Delete from `users` where Email = '$email'"); // delete query

if ($deleteAccount && $_GET["redirect"] == "manageAccount.php") {
    mysqli_close($conn); // Close connection
    header("location:../manageAccount.php"); // redirects to manageAccount page
    exit;
} else if ($deleteAccount && $_GET["redirect"] == "pendingAccount.php") {
    mysqli_close($conn); // Close connection
    header("location:../pendingAccount.php"); // redirects to pendingAccount page
    exit;
} else {
    echo "Error deleting record"; // display error message if not delete
}}
?>