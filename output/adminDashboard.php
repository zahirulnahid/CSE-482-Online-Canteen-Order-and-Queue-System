<?php
include("protection.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
  <title>ADMIN</title>
  <link rel="stylesheet" href="outputstyles.css">

  <script src="https://cdn.tailwindcss.com"></script>

  <script src="https://kit.fontawesome.com/b5ef430a48.js" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap"
    rel="stylesheet">
</head>

<body class="bg-pink-100 font-semibold min-h-screen bg-cover bg-no-repeat w-full scroll-smooth"
  style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">


  <!-- Navbar -->


  <nav class="bg-pink-600 bg-opacity-40 py-4 px-14 z-10">
    <div class="container mx-auto flex font-raleway justify-between items-center px-4">
      <a href="homepage.php" class="text-gray-800 text-2xl font-raleway">🍽NSU Canteen Admin</a>
      <div>
        <a href="login.php"
          class="bg-pink-700 hover:bg-pink-50 hover:text-black text-white font-raleway ml-5 py-3 px-5 float-right rounded-full focus:outline-black 
                                            focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow">Log
          Out</a>
      </div>
    </div>
  </nav>

  <!-- Admin dashboard -->


  <div class="container mx-auto my-8 px-20 py-16 ">
    <center>
      <h1 class="text-4xl font-raleway m-10"> 📊DASHBOARD</h1>
    </center>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-5 gap-10 rounded-3xl   text-center">
      <?php
      include("connection.php");

      $sql = "SELECT COUNT(email) from users WHERE `verified`='pending';";

      $result = $conn->query($sql);
      $result = mysqli_fetch_column($result);
      ?>
      <div
        class="card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
        <!-- <img src="../images/Burger.png" alt="Menu Item" class="rounded-t-lg mx-auto"> -->
        <div class="p-10">
          <h2 class="text-xl font-raleway mb-2">🔁Pending Account</h2>
          <a href="pendingAccount.php" class="text-pink-500 font-semibold mt-4">Click here to view pending accounts</a>
          <!-- <p class="text-pink-500 font-semibold mt-4">100 BDT</p> -->
          <div class="flex items-center mt-4">
            👥Pending users - <?php echo $result;?>
          </div>
        </div>
      </div>

      <div
        class="card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
        <!-- <img src="../images/chicken%20curry.png" alt="Menu Item" class="rounded-t-lg mx-auto"> -->
        <?php 
          $sql = "SELECT COUNT(email) from users;";

          $result = $conn->query($sql);
          $result = mysqli_fetch_column($result);
        ?>
        <div class="p-10">
          <h2 class="text-xl font-raleway mb-2">Manage Account</h2>
          <a href="manageAccount.php" class="text-pink-500 font-semibold mt-4">Click here to manage your account
            settings</a>
          <!-- <p class="text-pink-500 font-semibold mt-4">70 BDT</p> -->
          <div class="flex items-center mt-4">
            👥Total users: -
            <?php echo $result; ?>
          </div>
        </div>
      </div>

      <div
        class="card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
        <!-- <img src="../images/chicken%20curry.png" alt="Menu Item" class="rounded-t-lg mx-auto"> -->
        <div class="p-10">
          <h2 class="text-xl font-raleway mb-2">Get sales Info</h2>
          <a href="salesInfo.php" class="text-pink-500 font-semibold mt-4">Click here to view sales information</a>
          <!-- 
          <div class="flex items-center justify-center mt-4">
            Total sales: - 1000
          </div> -->
        </div>
      </div>

      <div
        class="card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
        <!-- <img src="../images/chicken%20curry.png" alt="Menu Item" class="rounded-t-lg mx-auto"> -->
        <div class="p-10">
          <h2 class="text-xl font-raleway mb-2">Update Menu</h2>
          <a href="updateMenu.php" class="text-pink-500 font-semibold mt-4">Click here to update your menu items</a>

          <div class="flex items-center justify-center mt-4">
            💰Total menu items:-
            <?php
            $sql = "SELECT COUNT(Item_Name) from FOOD_LIST;";

            $result = $conn->query($sql);
            $result = mysqli_fetch_column($result);
            echo $result;
            ?>
          </div>
          
        </div>
        
      </div>
      <div
        class="card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
       
        <div class="p-10">
          <h2 class="text-xl font-raleway mb-2">Get all orders</h2>
          <a href="orderHistory.php" class="text-pink-500 font-semibold mt-4">Click here to view all orders</a>
         
          


        </div>
      </div>
    </div>
  </div>





  <!-- menu cards -->
  <div class="container mt-5 mx-auto">
    <center>
      <h1 class="text-4xl font-raleway mb-8"><h1>🍴EXPLORE ON-GOING ITEMS</h1>
    </center>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 rounded-3xl p-16 text-center">
      <?php
      $sql = "SELECT * FROM `Food_List`";
      $result = $conn->query($sql);

      //declare array to store the data of database
      $row = [];

      if ($result->num_rows > 0) {
        // fetch all data from db into array 
        $row = $result->fetch_all(MYSQLI_ASSOC);
      }

      if (!empty($row))
        foreach ($row as $rows) {
          ?>
          <div
            class="card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
            <img src="../images/<?php echo $rows["Item_Name"]; ?>.png" alt="Menu Item" class="rounded-t-lg mx-auto">
            <div class="p-10">
              <h2 class="text-xl font-raleway mb-2">
                <?php echo $rows["Item_Name"]; ?>
              </h2>
              <p class="text-gray-700">
                <?php echo $rows["Description"]; ?>
              </p>
              <p class="text-pink-500 font-semibold mt-4">
                <?php echo $rows["Price"]; ?> BDT
              </p>
              <div class="flex items-center mt-4">
                💰Total Sold: -
                <?php
                $salesQuery = "SELECT units_sold FROM `SALES_REPORT` WHERE ItemID = '" . $rows["id"] . "'";
                $sold = $conn->query($salesQuery);
                $sold = mysqli_fetch_column($sold);
                echo $sold;
                ?>
              </div>
            </div>
          </div>
        <?php }
      $conn->close();
      ?>
    </div>
  </div>
  </div>
  </div>

  <footer class="bg-pink-600 py-5 px-14">
    <div class="mx-auto">
      <h1 class="text-gray-200 font-raleway">Contact Zahirul islam Nahid</h1>
    </div>
  </footer>
</body>

</html>