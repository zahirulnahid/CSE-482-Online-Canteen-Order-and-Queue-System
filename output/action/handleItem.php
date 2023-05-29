<?php
include("../protection.php");
include('../connection.php');

//Update Item in menu
if ($_POST["action"] == "add") {
  $itemName = $_POST["itemName"];
  $price = $_POST["price"];
  $description = $_POST["description"];
  $keyword = $_POST["keyword"];
  $image = $_POST["image"];
  $add = "INSERT INTO `food_list` (`Item_Name`, `Price`, `Description`, `keywords`, `Image_url`) VALUES ('$itemName', '$price', '$description', '$keyword', '$image');";
  if ($conn->query($add) === TRUE) {
    echo "Item Added Successfully";
    header('Location: ../updateMenu.php');
  } else {
    echo "Error Adding Item: " . $conn->error;
  }
  $conn->close();
} else if ($_GET["action"] == "update") {
  $id = $_GET["foodID"];
  $itemName = $_GET["name"];
  $price = $_GET["price"];
  $description = $_GET["description"];
  $keyword = $_GET["keyword"];
  $image = $_GET["image"];

  $sql = "SELECT * FROM `food_list` WHERE `id` = $id;";
  $item = mysqli_query($conn, $sql);
  if ($item) {
    $item = $item->fetch_assoc();
    if ($item['id'] == $id) {
      if (empty(trim($itemName))) {
        $itemName = $item['Item_Name'];
      }
      if (empty(trim($price))) {
        $price = $item['Price'];
      }
      if (empty(trim($description))) {
        $description = $item['Description'];
      }
      if (empty(trim($keyword))) {
        $keyword = $item['keywords'];
      }
      if (empty(trim($description))) {
        $image = $item['Image_url'];
      }
    }
    $update = "UPDATE `food_list` SET `Item_Name`='$itemName',`Price`='$price', `Description`='$description', `keywords`= '$keyword', `Image_url`= '$image' WHERE `food_list`.`id` = '" . $id . "';";

    if ($conn->query($update) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }

    $conn->close();
  }
} else if ($_GET["action"] == "delete") {
  $delete = "DELETE FROM `food_list` WHERE `food_list`.`id`= '" . $_GET['foodID'] . "';";
  if ($conn->query($delete) === TRUE) {
    echo "Record Deleted successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
  $conn->close();
}
?>