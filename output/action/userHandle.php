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

$sql = "UPDATE users SET verified='deactive' where Email = '$email'"; // delete query
if ($conn->query($sql) === TRUE) {
    if ($_GET["redirect"] == "manageAccount.php") {
        mysqli_close($conn); // Close connection
        header("location:../manageAccount.php");// redirects to manageAccount page
        exit;
    } else if ($_GET["redirect"] == "pendingAccount.php") {
        mysqli_close($conn); // Close connection
        header("location:../pendingAccount.php"); // redirects to pendingAccount page
        exit;
    } else {
        echo "Error deleting record"; // display error message if not delete
    }
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}

if($_GET["action"]=="notification"){
$sql = "SELECT * FROM notifications WHERE receiver_id = '".$_SESSION['id']."' AND status = 0";
$res = mysqli_query($conn, $sql);
$count=1;
if (mysqli_num_rows($res) > 0) {
    $notifications = []; // Initialize an empty array to store notifications

    while ($rows = mysqli_fetch_assoc($res)) {
        $notification = new stdClass();
        $notification->title = $rows["title"];
        $notification->id =$rows["id"];
        $notification->details = $rows["details"];
        $notifications[] = $notification; // Add the notification object to the array
    }
    
    $count = count($notifications); // Get the count of notifications
    
    $responseObj = new stdClass();
    $responseObj->notifications = $notifications;
    $responseObj->count = $count;
    
    $myJSON = json_encode($responseObj); echo $myJSON;
}else{ 
    $notifications = [];
    $myObj = new stdClass();
    $myObj->title = "No notification";
    $myObj->details = "";
    $myObj->count = "0";
    $responseObj = new stdClass();
    $responseObj->notifications = $notifications;
    $myJSON = json_encode($responseObj); echo $myJSON;

}
}
$conn->close();
?>