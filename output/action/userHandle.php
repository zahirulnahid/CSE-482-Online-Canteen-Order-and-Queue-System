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

$sql =  "Delete from `users` where Email = '$email'"; // delete query
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
    while ($rows = mysqli_fetch_assoc($res)) {
        $myObj = new stdClass();
        $myObj->title = $rows["title"];
        $myObj->details = $rows["details"];
        $myObj->count =$count;
        $count++;
        $myJSON = json_encode($myObj);
        
              
    } echo $myJSON;
}else echo 0;
}
$conn->close();
?>