<?php
//
include("../protection.php");
include("../connection.php");



if (isset($_GET["foodID"]))
  $id = $_GET["foodID"];
$exists = "SELECT * FROM `cart` WHERE `foodID` = '$id' AND `email` = '".$_SESSION["email"]."';";
$sql = "INSERT INTO `cart`(`email`, `foodID`, `quantity`) VALUES ('".$_SESSION["email"]."', $id, 1)";
$exists = $conn->query($exists);

//Add item to cart if it doesn't exist in the cart already, else update the quantity
if (mysqli_num_rows($exists) == 0) {
  $conn->query($sql); //insert into the cart after calling the sql query
} else {
  $row = $exists->fetch_assoc();
 $sql = "UPDATE `cart` SET `quantity`=" . ($row['quantity'] + 1) . "   WHERE foodID = $id AND email = '".$_SESSION["email"]."';";
  $conn->query($sql);
}

//get total quantity of items in the cart to display in out cart button
$sql = "SELECT sum(`quantity`)as `total` FROM cart where email='".$_SESSION["email"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    echo $row["total"];
  }
} else {
  echo "0";
}
$conn->close();
?>