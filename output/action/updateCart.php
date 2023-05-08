<?php
//
include("../protection.php");
include("../connection.php");


if (isset($_GET["foodID"]))
  $id = $_GET["foodID"];
if (isset($_GET["scope"]))
  $scope = $_GET["scope"];
$existsql = "SELECT * FROM `cart` WHERE `foodID` = '$id' AND `email` = '".$_SESSION["email"]."';";
$exists = $conn->query($existsql);
if ($exists == TRUE) {
  if ($scope == "add") {
    $row = $exists->fetch_assoc();
    $sql = "UPDATE `cart` SET `quantity`=" . ($row['quantity'] + 1) . "   WHERE foodID = $id AND email = '".$_SESSION["email"]."';";
    $conn->query($sql);
  } else if ($scope == "remove") {
    $row = $exists->fetch_assoc();
    if ($row['quantity'] > 0) {
      $sql = "UPDATE `cart` SET `quantity`=" . ($row['quantity'] - 1) . "   WHERE foodID = $id AND email = '".$_SESSION["email"]."';";
      $conn->query($sql);
    } else if ($row['quantity'] == 0) {
      $sql = "DELETE FROM `cart` WHERE foodID = $id AND email = '".$_SESSION["email"]."';";
      $conn->query($sql);
    }
  }
} else {
  echo "Connection error<br>";
}
$exists = $conn->query($existsql);
$row = $exists->fetch_assoc();
echo $row['quantity'];
?>