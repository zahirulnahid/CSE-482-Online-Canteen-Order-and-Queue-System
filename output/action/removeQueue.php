<?php
include("../protection.php");
include("../connection.php");

$queueNo = $_GET["QueueID"];
$orderID = $_GET["OrderID"];
$removeQueue = "DELETE FROM Queue WHERE QueueNo = $queueNo;";
$completeOrder = "UPDATE `bill` SET `served`='yes' WHERE OrderID='$orderID'";

if($conn->Query($removeQueue) == true && $conn->Query($completeOrder) == true){
    header("location:../serverDashboard.php");
    exit;
}
else
    echo "Queue Not Removed";
$conn->close();
?>