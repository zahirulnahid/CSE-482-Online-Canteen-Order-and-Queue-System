<?php
session_start();
include('connection.php');
$_SESSION["loggedin"] = false;


if (isset($_POST["password"]))
  $hashed_password = md5($_POST["password"]);

if (isset($_POST["email"]))
  $email = $_POST["email"];
$sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$hashed_password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    if ($row["password"] == $hashed_password) {
      $_SESSION["loggedin"] = true;
      $_SESSION["loginas"] = "user";
      $_SESSION["email"] = $email;
      $_SESSION["name"] = $row["name"];

      $_SESSION["userType"]=$row["category"];
      header("location: ".$userType[$_SESSION["userType"]][0]."");
      $cookie_name = "user";
      $cookie_value = $_POST["email"];
      if (isset($_POST["remember_me"]))
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30));
    } else {
      header("location: login.php");
      $_SESSION["errorMessage"] = "Wrong Password!";
    }
  }
} else {
  $_SESSION["errorMessage"] = "No user found! or Wrong Password!";
  header("location: login.php");
}


?>