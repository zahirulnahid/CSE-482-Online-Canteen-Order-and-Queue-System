<?php
include("protection.php");
include('connection.php');

$email = $_GET["id"]; // get id through query string
$sql = "UPDATE `users` SET `verified`='true' WHERE `email`= '$email';";
$approveAccount = mysqli_query($conn, $sql); // update query

if ($approveAccount) {
    mysqli_close($conn); // Close connection
    header("location:pendingAccount.php"); // redirects to manageAccount page
    exit;
} else {
    echo "Error updating record"; // display error message if not delete
}
?>