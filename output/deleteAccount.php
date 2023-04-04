<?php
include('connection.php');
$email = $_GET["id"]; // get id through query string

$deleteAccount = mysqli_query($conn,"Delete from `users` where Email = '$email'"); // delete query

if($deleteAccount)
{
    mysqli_close($conn); // Close connection
    header("location:manageAccount.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>