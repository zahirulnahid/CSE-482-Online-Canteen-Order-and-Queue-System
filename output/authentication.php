<?php
session_start();
include('connection.php');
$_SESSION["loggedin"]=false;

if(isset($_POST["password"]))$hashed_password = md5($_POST["password"]);

if(isset($_POST["email"]))$email=$_POST["email"];
echo $sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$hashed_password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $_SESSION["loggedin"]=true;
    header("location: homepage.php");
  }
} else {
  header("location: login.php");
}
