<?php
include('connection.php');
include('protection.php');

$queueNo = $_GET["id"];
$removeQueue = "DELETE FROM Queue WHERE QueueNo = $queueNo;";

if($conn->Query($removeQueue) == true){
    header("location:serverDashboard.php");
    exit;
}
else
    echo "Queue Not Removed";
?>