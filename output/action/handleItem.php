<?php
include("../protection.php");
include('../connection.php');

//Update Item in menu
if ($_GET["action"] == "update") {
    $id = $_GET["foodID"];
    $itemName = $_GET["name"];
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
                echo $id. " ".$itemName;
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
          $update = "UPDATE `food_list` SET `Item_Name`='" . $itemName . "',`Price`='" . $price . "',`Description`='" . $description . "' WHERE `food_list`.`id` = '" . $id . "';";
          $result = $conn->query($update);
          $conn->close();
    }
}
if ($_GET["action"] == "delete") {
    $delete = "DELETE FROM `food_list` WHERE `food_list`.`id`= '" . $_GET['foodID'] . "';";
    $result = $conn->query($delete);
    $conn->close();
}
?>