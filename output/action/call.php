<?php
include("../protection.php");
include("../connection.php");

if (isset($_GET["counter"]) && isset($_GET["OrderID"])) {
    $counterNo = $_GET["counter"];
    $orderID = $_GET["OrderID"];
    $senderid = $_GET["sid"];
    $val = $_GET["cid"];

    $title = "Order Ready";
    $details = "Collect your food from counter $counterNo";

    // Update Counter Number
    $updateCounter = "UPDATE Queue SET counter = $counterNo WHERE OrderID = $orderID;";
    // Send notification to user
    $sql = "INSERT INTO `notifications` (`id`, `sender_id`, `receiver_id`, `title`, `details`, `created_at`, `updated_at`) VALUES (NULL, '$senderid', '$val', '$title', '$details', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";

    if (($conn->Query($updateCounter) == true) && ($conn->Query($sql) == true)) {
        header("location:../serverDashboard.php");
        exit;
    } else
        echo "Queue Not Removed";
    $conn->close();
}
?>