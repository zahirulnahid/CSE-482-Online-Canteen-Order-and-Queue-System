<?php
include("protection.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
  <title>Update Menu</title>
  <link rel="stylesheet" href="outputstyles.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-100 scroll-smooth font-semibold min-h-screen bg-cover bg-no-repeat w-full"
  style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">

  <!-- Navbar -->
  <nav class="bg-pink-700 bg-opacity-40 py-4 px-14">
    <div class="container mx-auto flex font-serif justify-between items-center px-4">
      <a href="#" class="text-gray-800 text-2xl font-bold">NSU Canteen</a>

      <div>
        <button
          class="bg-pink-700 hover:bg-pink-50 hover:text-black text-white font-bold py-3 px-5 rounded-full focus:outline-black 
                                            focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow"
          type="submit">Log Out</button>
      </div>
    </div>

  </nav>

  <div class="flex m-14">
    <!-- <h1 class="text-4xl mx-auto  text-center mb-8 ">Our Menu</h1> -->
    <!-- search bar -->
    <div class="px-20 my-4 p-4 w-full float-left">
      <label class="block text-gray-700 font-bold mb-2 " for="search">Search</label>
      <input
        class="border-2 border-gray-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
        type="search" name="search" id="search">
      <button href="invoice.php" class=" p-5 min-w-fit   float-right bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-pink-100 rounded-full border-spacing-2
                            font-bold focus:ring-2 hover:translate-0 hover:transition-shadow">
        <img src="../images/shopping-cart.png" alt="Cart Icon" class="inline-block align-middle mr-2" height="24"
          width="24">
        Cart(0)
      </button>
    </div>


  </div>

  <!-- menu list view -->
  <ul class="grid grid-cols-1 gap-4 mx-auto my-28 container shadow-none">
    <?php
    include('connection.php');

    $sql = "SELECT * FROM `Food_List`";
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

        <li class="bg-pink-50 rounded-xl shadow-lg mb-4 overflow-hidden flex">
          <img src="<?php echo $rows['Image_url']; ?>" alt="Product"
            class="w-24 h-24 rounded-2xl m-5 object-cover flex-shrink-0">
          <div class="p-5 flex-grow">
            <h3 class="text-base font-bold text-gray-900 mb-1">
              <?php echo $rows['Item_Name']; ?>
            </h3>
            <p class="text-gray-700 font-medium">
              <?php echo $rows['Price']; ?> BDT
            </p>
            <p class="text-gray-700">
              <?php echo $rows['Description']; ?>
            </p>

            <button onclick="openModal(<?php echo $rows['id'] ?>)" class=" px-5 py-2 min-w-fit  float-right bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-pink-100 rounded-full border-spacing-2
                    font-bold focus:ring-2 hover:translate-0 hover:transition-shadow">Edit</button>

            <!-- The modal -->
            <div id="myModal_<?php echo $rows['id'] ?>" class="modal hidden fixed z-10 inset-0 overflow-y-auto">
              <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                <!-- Modal content -->
                <div class="modal-content bg-white rounded-lg shadow-xl px-6 py-4">
                  <p class="text-lg font-bold mb-2">Update item</p>
                  <form method="POST">
                    <input type="hidden" name="itemID" id="itemID" value="<?php echo $rows['id']; ?>">
                    <label for="itemName">Item Name: </label>
                    <input type="text" name="itemName" id="itemName" placeholder="<?php echo $rows['Item_Name']; ?>"
                      class="border-2 border-gray-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"><br><br>
                    <label for="price">Price: </label>
                    <input type="text" name="price" id="price" placeholder="<?php echo $rows['Price']; ?>"
                      class="border-2 border-gray-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"><br><br>
                    <label for="description">Description: </label>
                    <input type="text" name="description" id="description" placeholder="<?php echo $rows["Description"]; ?>"
                      class="box-content border-2 border-gray-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"><br><br>
                    <div class="flex justify-between">
                      <button class="px-5 py-2 min-w-fit  float-right bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-pink-100 rounded-full border-spacing-2
                    font-bold focus:ring-2 hover:translate-0 hover:transition-shadow"
                        onclick="updateItem(<?php echo $rows['id']; ?>)">Update</button>
                      <button class="px-5 py-2 min-w-fit  float-right bg-red-700 text-gray-100 hover:text-gray-800 hover:bg-red-100 rounded-full border-spacing-2
                    font-bold focus:ring-2 hover:translate-0 hover:transition-shadow"
                        onclick="deleteItem()">Delete</button>
                  </form>
                  <button class="px-5 py-2 bg-gray-500 text-white-100 hover:text-gray-800 hover:bg-gray-100 rounded-full border-spacing-2
                    font-bold focus:ring-2 hover:translate-0 hover:transition-shadow"
                    onclick="closeModal(<?php echo $rows['id'] ?>)">Close</button>
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

    function updateItem(x) {

      <?php
      $itemName = $_POST['itemName'];
      $price = $_POST['price'];
      $description = $_POST['description'];

      foreach ($row as $rows) {
        if ($rows['id'] == $_POST['itemID']) {
          if (empty(trim($itemName))) {
            $itemName = $rows['Item_Name'];
          }
          if (empty(trim($price))) {
            $price = $rows['Price'];
          }
          if (empty(trim($description))) {
            $description = $rows['Description'];
          }
        }
      }
      $update = "UPDATE `food_list` SET `Item_Name`='" . $itemName . "',`Price`='" . $price . "',`Description`='" . $description . "' WHERE `food_list`.`id` = '" . $_POST['itemID'] . "';";
      $result = $conn->query($update);
      ?>
      setTimeout(function () {
        window.location.reload();
      }, 5000);
    }

    function deleteItem() {
      <?php
      $delete = "DELETE FROM `food_list` WHERE `food_list`.`id`= '" . $_POST['itemID'] . "';";
      $result = $conn->query($delete);
      $conn->close();
      ?>
    }
  </script>
 <footer class="bg-pink-600 text-white px-4 py-6">
  <div class="max-w-7xl mx-auto">
    <div class="flex flex-wrap justify-between">
      <div class="w-full md:w-1/3 lg:w-1/4 mb-6">
        <h3 class="text-lg font-medium mb-2">🚹 About Us:</h3>
        <p class="text-sm">📝 For the purpose of the CSE 482 & CSE 482 <br> Lab project, this website was developed <br> by us. <br><br> Thank you! 🤍</p>
      </div>
      <div class="w-full md:w-1/3 lg:w-1/4 mb-6">
        <h3 class="text-lg font-medium mb-2">🧑🏻‍💻 Our Services:</h3>
        <ul class="text-sm">
          <li><a href="#">✅ Universal Canteen Meal Ordering Portal</a></li>
          <li><a href="#">✅ Automate Canteen Meal Ordering</a></li>
          <li><a href="#">✅ Introduce Digital Payment</a></li>
          <li><a href="#">✅ Queue System to Save Time</a></li>
        </ul>
      </div>
      <div class="w-full md:w-1/3 lg:w-1/4 mb-6">
        <h3 class="text-lg font-medium mb-2">📩 Contact Us:</h3>
        <p class="text-sm">🌎 Bashundhara R\A; Dhaka, Bangladesh<br>📠 +880-2-55668200<br>📧 Mail Address - 482@nsu.com <br>🕐 Office Hours: Varsity Time </p>
      </div>
      <div class="w-full md:w-1/3 lg:w-1/4 mb-6">
        <h3 class="text-lg font-medium mb-2">🌐 Location:</h3>
        <div class="flex">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.098092052636!2d90.42298167501689!3d23.81511067862635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c64c103a8093%3A0xd660a4f50365294a!2sNorth%20South%20University!5e0!3m2!1sen!2sbd!4v1683553954593!5m2!1sen!2sbd" width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-6 border-t border-gray-700 pt-4 flex justify-between items-center">
    <p class="text-sm">&copy; 2023 CSE™️   All Rights Reserved ✔️</p>
    <ul class="flex text-sm">
      <li class="mr-4"><a href="#">📑 Terms of Service</a></li>
      <li class="mr-4"><a href="#">🔏 Privacy Policy</a></li>
    </ul>
  </div>
</footer>
</body>

</html>