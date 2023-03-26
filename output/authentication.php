<?php
session_start();
include('connection.php');

$sql = "SELECT * FROM `user` WHERE `phone`='$_POST[phone]' AND `password`='$_POST[password]'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $phone=$row['phone'];
   $userid=$row['id'];
    $_SESSION["name"]=$row['name'];
   if($_POST['phone']==$phone) $_SESSION["loggedin"] = true;
     $_SESSION["account_as"]=$_POST["account_as"];
     $_SESSION["imgsrc"]=$row['imgsrc'];
  }
} else {
  $_SESSION["message"]="Sorry Login Information is Wrong!";
}

//if(($phone==$_POST["phone"])&&($password==$_POST["password"])){ $_SESSION["loggedin"] = true;}

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
    header("location: homepage.php");
    $_SESSION["userid"]=$userid;
    exit;
}
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>