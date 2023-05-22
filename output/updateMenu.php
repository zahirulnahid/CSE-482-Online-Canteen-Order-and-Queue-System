<?php
include("protection.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <title>Update Menu</title>
  <link rel="stylesheet" href="outputstyles.css">
  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap" rel="stylesheet">
</head>

<body class="bg-pink-100 scroll-smooth font-semibold min-h-screen bg-cover bg-no-repeat w-full"
  style="background-image: url('images/Homepage bg .png'); backdrop-filter:blur(3px);">

  <!-- Navbar -->
 <?php include('ui/header.php'); ?>



  <!-- menu list view -->
  <a href="adminDashboard.php"
  class="p-4 float-none mx-auto m-8 justify-center hover:bg-gray-100 hover:text-gray-900 text-gray-100 bg-pink-700 rounded-full font-raleway hover:ring-pink-700 ring-2 hover:ring-2  hover:translate-0 hover:transition-shadow block w-max">
  Back to dashboard
</a>
  <ul class="grid sm:grid-cols-1 gap-4 mx-auto my-8 sm:my-12 md:my-16 px-4 sm:px-8 md:px-16 lg:px-20 container shadow-none">
    <?php
    include('connection.php');

    $sql = "SELECT * FROM `food_list`";
    $result = $conn->query($sql);

    //declare array to store the data of database
    $row = [];

    if ($result->num_rows > 0) {
      // fetch all data from db into array 
      $row = $result->fetch_all(MYSQLI_ASSOC);
    }

    if (!empty($row))
      foreach ($row as $key => $rows) {

        ?>

        <li class="bg-gray-50 rounded-xl shadow-lg mb-6 overflow-hidden flex">
          <img src="<?php echo $rows['Image_url']; ?>" alt="Product"
            class="w-24 h-24 rounded-2xl m-5 object-cover flex-shrink-0">
          <div class="p-5 flex-grow">
            <h3 class="text-base font-raleway text-gray-900 mb-1">
              <?php echo $rows['Item_Name']; ?>
            </h3>
            <p class="text-gray-700 font-medium">
              <?php echo $rows['Price']; ?> BDT
            </p>
            <p class="text-gray-700 pb-4">
              <?php echo $rows['Description']; ?>
            </p>

            <button onclick="openModal(<?php echo $rows['id'] ?>)" class=" px-5 py-2 min-w-fit  float-right bg-pink-700 text-gray-100 hover:text-gray-800 hover:ring-2 hover:ring-pink-600 hover:bg-gray-100 rounded-full border-spacing-2
                    font-raleway focus:ring-2 hover:translate-0 hover:transition-shadow">Edit</button>

            <!-- The modal -->
          </div>
          <div id="myModal_<?php echo $rows['id'] ?>" class="modal hidden fixed z-10 inset-0 overflow-y-auto">
  <div class="flex items-center justify-center min-h-screen pt-4 px-4 my-auto text-center sm:block sm:p-0">
    <!-- Modal content -->
    <div class="modal-content bg-gray-500 text-gray-50 flex ring-4 ring-pink-600 justify-center items-center rounded-xl mt-20 px-6 py-4 m-auto max-w-fit shadow-2xl">
      <div>
        <input type="hidden" name="itemID" id="itemID<?php echo $rows['id']; ?>" value="<?php echo $rows['id']; ?>">
        <div class="mb-4">
          <label for="itemName" class="block text-white">Item Name:</label>
          <input type="text" name="itemName" id="itemName<?php echo $rows['id']; ?>" value="<?php echo $rows['Item_Name']; ?>" class="border-2 border-pink-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
        </div>
        <div class="mb-4">
          <label for="price" class="block text-white">Price:</label>
          <input type="text" name="price" id="price<?php echo $rows['id']; ?>" value="<?php echo $rows['Price']; ?>" class="border-2 border-pink-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
        </div>
        <div class="mb-4">
          <label for="description" class="block text-white">Description:</label>
          <input type="text" name="description" id="description<?php echo $rows['id']; ?>" value="<?php echo $rows["Description"]; ?>" class="box-content border-2 border-pink-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
        </div>
        <div class=" mb-4">
          <label for="keyword" class="block text-white">Keywords:</label>
          <input type="text" name="keyword" placeholder="keywords:" id="keyword<?php echo $rows['id']; ?>" value="<?php echo $rows['keywords']; ?>" class="border-2 border-pink-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
        </div>
        <div class="mb-4">
          <label for="image" class="block text-white">Image:</label>
          <input type="text" name="image" id="image<?php echo $rows['id']; ?>" value="<?php echo $rows['Image_url']; ?>" class="border-2 border-pink-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
        </div>
        <div class="flex justify-end">
          <button class="px-5 py-2 mx-2 min-w-fit bg-white text-gray-900 hover:text-gray-100 hover:bg-pink-700 hover:ring-2 ring-pink-600 ring-600 ring-2 rounded-full border-spacing-2 font-raleway focus:ring-2 hover:translate-0 hover:transition-shadow" onclick="deleteItem(document.getElementById('itemID<?php echo $rows['id']; ?>').value)">Delete</button>
          <button class="px-5 py-2 mx-2 min-w-fit bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-gray-50 hover:ring-2 hover:ring-pink-700 rounded-full border-spacing-2 font-raleway focus:ring-2 hover:translate-0 hover:transition-shadow" onclick="updateItem(document.getElementById('itemID<?php echo $rows['id']; ?>').value, document.getElementById('itemName<?php echo $rows['id']; ?>').value, document.getElementById('price<?php echo $rows['id']; ?>').value, document.getElementById('description<?php echo $rows['id']; ?>').value, document.getElementById('keyword<?php echo $rows['id']; ?>').value, document.getElementById('image<?php echo $rows['id']; ?>').value)">Update</button>
          <button class="px-5 py-2 mx-2 bg-gray-50 text-gray-900 hover:bg-gray-900 hover:text-white ring-2 ring-pink-500 hover:ring-2 hover:ring-pink-700 rounded-full border-spacing-2 font-raleway focus:ring-2 hover:translate-0 hover:transition-shadow" onclick="closeModal(<?php echo $rows['id'] ?>)">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>


            </li>
          
      <?php } ?>
  </ul>

  <!-- Script to open and close the modal -->
  <script>
    function openModal(x) {
      document.getElementById("myModal_" + x).classList.remove("hidden");
    }

    function closeModal(x) {
      document.getElementById("myModal_" + x).classList.add("hidden");
    }
    function updateItem(id, name, price, description, keyword, image) {
        
          const xhr = new XMLHttpRequest();
          xhr.open("GET", "action/handleItem.php?action=update&foodID=" + id + "&name=" + name + "&price=" + price + "&description=" + description + "&keyword=" + keyword + "&image=" + image);
          xhr.onload = function () {
            if (xhr.status === 200) {
              console.log("action/handleItem.php?action=update&foodID=" + id + "&name=" + name + "&price=" + price + "&description=" + description + "&keyword=" + keyword + "&image=" + image)
            }
          };
          xhr.send();
          setTimeout(function(){ window. location. reload(); }, 5000); 
        }
        function deleteItem(id) {
          console.log("id: "+id);
          const xhr = new XMLHttpRequest();
          xhr.open("GET", "action/handleItem.php?action=delete&foodID=" + id);
          xhr.onload = function () {
            if (xhr.status === 200) {
              console.log("action/handleItem.php?action=delete&foodID=" + id)
            }
          };
          xhr.send();
          location.reload();
        }
    
    // function updateItem(x) {

    //   <?php
    //   $itemName = $_POST['itemName'];
    //   $price = $_POST['price'];
    //   $description = $_POST['description'];

    //   foreach ($row as $rows) {
    //     if ($rows['id'] == $_POST['itemID']) {
    //       if (empty(trim($itemName))) {
    //         $itemName = $rows['Item_Name'];
    //       }
    //       if (empty(trim($price))) {
    //         $price = $rows['Price'];
    //       }
    //       if (empty(trim($description))) {
    //         $description = $rows['Description'];
    //       }
    //     }
    //   }
    //   $update = "UPDATE `food_list` SET `Item_Name`='" . $itemName . "',`Price`='" . $price . "',`Description`='" . $description . "' WHERE `food_list`.`id` = '" . $_POST['itemID'] . "';";
    //   $result = $conn->query($update);
    //   ?>
    //   setTimeout(function () {
    //     window.location.reload();
    //   }, 5000);
    // }

    // function deleteItem() {
    //   <?php
    //   $delete = "DELETE FROM `food_list` WHERE `food_list`.`id`= '" . $_POST['itemID'] . "';";
    //   $result = $conn->query($delete);
    //   $conn->close();
    //   ?>
    // }
  </script>
   <?php include ('ui/footer.php');?>
</body>

</html>