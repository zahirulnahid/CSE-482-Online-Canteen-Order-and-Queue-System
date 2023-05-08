<?php
include("protection.php");
include('connection.php');
$email = $_GET["id"]; // get id through query string

$sql="Delete from `users` where Email = '$email'"; // delete query
if ($conn->query($sql) === TRUE) {
    if ($_GET["redirect"] == "manageAccount.php") {
        mysqli_close($conn); // Close connection
        header("location:manageAccount.php"); // redirects to manageAccount page
        exit;
    } else if ($_GET["redirect"] == "pendingAccount.php") {
        mysqli_close($conn); // Close connection
        header("location:pendingAccount.php"); // redirects to pendingAccount page
        exit;
    } else {
        echo "Error deleting record"; // display error message if not delete
    }
  } else {
    echo "Error deleting record: " . $conn->error;
  }




?>