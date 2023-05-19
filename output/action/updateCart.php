<?php
//
include("../protection.php");
include("../connection.php");


if (isset($_GET["foodID"]))
  $id = $_GET["foodID"];
if (isset($_GET["scope"]))
  $scope = $_GET["scope"];

$existsql = "SELECT * FROM `cart` WHERE `foodID` = '$id' AND `email` = '" . $_SESSION["email"] . "';";
$exists = $conn->query($existsql);

if ($exists == TRUE) {
  // Add quantity of selected item by 1
  if ($scope == "add") {
    $row = $exists->fetch_assoc();
    $sql = "UPDATE `cart` SET `quantity`=" . ($row['quantity'] + 1) . "   WHERE foodID = $id AND email = '" . $_SESSION["email"] . "';";
    $conn->query($sql);
  }
  // Subtract quantity of selected item by 1
  else if ($scope == "remove") {
    $row = $exists->fetch_assoc();
    if ($row['quantity'] > 1) {
      $sql = "UPDATE `cart` SET `quantity`=" . ($row['quantity'] - 1) . "   WHERE foodID = $id AND email = '" . $_SESSION["email"] . "';";
      $conn->query($sql);
    }
    // Remove item from cart if the quantity becomes 0
    else if ($row['quantity'] == 1) {
      $sql = "DELETE FROM `cart` WHERE foodID = $id AND email = '" . $_SESSION["email"] . "';";
      $conn->query($sql);
    }
  }
} else {
  echo "Connection error<br>";
}
$conn->close();
?>