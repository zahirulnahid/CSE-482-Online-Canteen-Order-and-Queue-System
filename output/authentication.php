<?php
session_start();
include('connection.php');
$_SESSION["loggedin"] = false;


if (isset($_POST["password"]))
  $hashed_password = md5($_POST["password"]);

if (isset($_POST["email"]))
  $email = $_POST["email"];
$sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$hashed_password' AND `verified` = 'true'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    if ($row["password"] == $hashed_password) {
      $_SESSION["loggedin"] = true;
      $_SESSION["loginas"] = "user";
      $_SESSION["email"] = $email;
      $_SESSION["name"] = $row["name"];
      $_SESSION["id"] = $row["id"];
      $_SESSION["userType"] = $row["category"];
      header("location: " . $userType[$_SESSION["userType"]][0] . "");
      $cookie_name = "token";
      $cookie_value = md5($_POST["email"] . date("hisaYmd"));
      if (isset($_POST["remember_me"])) {
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30));
        $sql = "UPDATE `users` SET `token`='$cookie_value' WHERE `email`='$email'";
        if ($conn->query($sql) === TRUE) {

        } else {
          echo "Error updating record: " . $conn->error;
        }
      }
    } else {
      header("location: login.php");
      $_SESSION["errorMessage"] = "Wrong Password!";
    }
  }
} else if ($conn->query("SELECT * FROM `users` WHERE `email`='$email' AND `password`='$hashed_password' AND `verified` = 'pending'")) {
  $_SESSION["errorMessage"] = "Your Account has not been approved yet!";
  header("location: login.php");
} else {
  $_SESSION["errorMessage"] = "No user found! or Wrong Password!";
  header("location: login.php");
}


?>