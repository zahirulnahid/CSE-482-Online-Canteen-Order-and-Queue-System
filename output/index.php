<?php
session_start();
include("connection.php");

$cookie_name = "token";
if (isset($_COOKIE[$cookie_name])) {
  $token = $_COOKIE[$cookie_name];
  $sql = "SELECT * FROM `users` WHERE `token`='$token'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      $_SESSION["loggedin"] = true;
      $_SESSION["loginas"] = "user";
      $_SESSION["email"] = $row["email"];
      $_SESSION["name"] = $row["name"];
      $_SESSION["userType"]=$row["category"];
      $_SESSION["id"] = $row["id"];
      $cookie_name = "token";
      $cookie_value = $token;
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30));
    }
    //Redirect to homepage if user is logged in
    header("location: ".$userType[$_SESSION["userType"]][0]."");
  } else {
    // Redirect to login page if user is not logged in
    header("location: login.php");
  }


  //if($_SESSION["loginas"]=="user") header("location: homepage.php");else header("location: login.php");
}

if(isset($_SESSION["userType"])){
    header("location: ".$userType[$_SESSION["userType"]][0]."");
}
else {
  // Redirect to login page if user is not logged in
 header("location: login.php");
}
?>