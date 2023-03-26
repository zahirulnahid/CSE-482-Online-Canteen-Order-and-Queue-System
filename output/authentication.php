<?php
session_start();
include('connection.php');

if($_POST["account_as"]=='driver')$sql = "SELECT * FROM `driver` WHERE `phoneNo`='$_POST[phone]' AND `password`='$_POST[password]'";;
if($_POST["account_as"]=='passenger')$sql = "SELECT * FROM `passenger` WHERE `phoneNo`='$_POST[phone]' AND `password`='$_POST[password]'";;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $phone=$row['phoneNo'];
   $userid=$row['id'];
    $_SESSION["name"]=$row['name'];
   if($_POST['phone']==$phone) $_SESSION["loggedin"] = true;
     $_SESSION["account_as"]=$_POST["account_as"];
     $_SESSION["imgsrc"]=$row['imgsrc'];
  }
} else {
  $_SESSION["message"]="Sorry Login Information is Wrong!";
}

//if(($phoneNo==$_POST["phoneNo"])&&($password==$_POST["password"])){ $_SESSION["loggedin"] = true;}

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
    header("location: index.php");
    $_SESSION["userid"]=$userid;
    exit;
}
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>