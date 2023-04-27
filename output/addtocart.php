<?php
//
include("protection.php");
include("connection.php");
$cookie_name = "user";
$cookie_email = $_COOKIE[$cookie_name];


if (isset($_GET["foodID"]))
  $id = $_GET["foodID"];
$exists = "SELECT * FROM `cart` WHERE `foodID` = '$id' AND `email` = '$cookie_email';";
$sql = "INSERT INTO `cart`(`email`, `foodID`, `quantity`) VALUES ('$cookie_email', $id, 1)";
$exists = $conn->query($exists);
if (mysqli_num_rows($exists) == 0) {
  $conn->query($sql);
} else {
  $row = $exists->fetch_assoc();
  $sql = "UPDATE `cart` SET `quantity`=" . $row['quantity'] + 1 . "   WHERE foodID = $id AND email = '$cookie_email';";
  $conn->query($sql);
}
$sql = "SELECT count(id)as `total` FROM cart where email='$cookie_email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    echo $row["total"];
  }
} else {
  echo "0";
}

?>