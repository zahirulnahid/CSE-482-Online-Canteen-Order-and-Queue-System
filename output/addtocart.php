1<?php
include("protection.php");
include("connection.php");
$cookie_name="user";
$cookie_email = $_COOKIE[$cookie_name];


if(isset($_GET["foodID"]))$id=$_GET["foodID"];
$sql = "INSERT INTO `cart`(`email`, `foodID`) VALUES ('$cookie_email',$id)";

if ($conn->query($sql) === TRUE) {
  
} else {
  
}
$sql = "SELECT count(id)as `total` FROM cart where email='$cookie_email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo  $row["total"];
  }
} else {
  echo "0";
}

?>