<?php
session_start();
include("connection.php");
$cookie_name="user";
if(isset($_COOKIE[$cookie_name])){$cookie_email = $_COOKIE[$cookie_name];
echo $sql = "SELECT * FROM `users` WHERE `email`='$cookie_email'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $_SESSION["loggedin"] = true;
    $_SESSION["loginas"] = "user";
    $cookie_name = "user";
    $cookie_value = $cookie_email;
    $_SESSION["email"]=$cookie_email;
            $_SESSION["name"]=$row["name"];

    setcookie($cookie_name, $cookie_value, time() + (86400 * 30));
  }
   //Redirect to homepage if user is logged in
 header("location: homepage.php");
} else {
  // Redirect to login page if user is not logged in
  header("location: login.php");
}


//if($_SESSION["loginas"]=="user") header("location: homepage.php");else header("location: login.php");
}else {
  // Redirect to login page if user is not logged in
  header("location: login.php");
}
?>