<?php
$servername = "localhost";
$username = "canteen";
$password = "canteen";
$database = "canteen";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "";
$db = mysqli_connect($servername, $username, $password, $database);
//(ADMIN)
$userType[4]=array('adminDashboard.php','manageAccount.php','pendingAccount.php','salesInfo.php','updateMenu.php','orderHistory.php');
//(USER)
$userType[1]=array('homepage.php','invoice.php','myOrders.php');
$userType[2]=$userType[1];
//(STAFF)
$userType[3]=array('serverDashboard.php');
?>