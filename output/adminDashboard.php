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

<style>
  .show-full-description {
    white-space: normal !important;
    overflow: visible !important;
    height: auto !important;
  }
</style>
</head>

<body class=" font-semibold min-h-screen bg-cover bg-no-repeat w-full scroll-smooth"
  style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">


  <!-- Navbar -->
  <?php include('ui/header.php'); ?>

  <!-- Admin dashboard -->
  <div class="container mx-auto my-6 px-20 py-16 ">

    <center>
      <h1 class="text-4xl font-raleway m-10"> 📊 ADMIN DASHBOARD</h1>
    </center>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-10 rounded-3xl   text-center">
      <?php
      include("connection.php");

      $sql = "SELECT COUNT(email) from users WHERE `verified`='pending';";
      $result = $conn->query($sql);
      if ($result) {
        $row = $result->fetch_row();
        $count = $row[0];
        // Use $count as needed
      } else {
        // Handle the case where the query fails
      }
      ?>
      <div
        class="card text-center shadow-xl rounded-xl bg-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
        <!-- <img src="../images/Burger.png" alt="Menu Item" class="rounded-t-lg mx-auto"> -->
        <a href="pendingAccount.php">
          <div class="p-10">
            <h2 class="text-xl font-raleway mb-2">🔁Pending Account</h2>
            <p class="text-pink-500 font-semibold mt-4">Click here to view pending accounts</p>
            <!-- <p class="text-pink-500 font-semibold mt-4">100 BDT</p> -->
            <div class="flex items-center mt-4">
              👥Pending users -
              <?php echo $count; ?>
            </div>
          </div>
        </a>
      </div>

      <div
        class="card text-center shadow-xl rounded-xl bg-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
        <!-- <img src="../images/chicken%20curry.png" alt="Menu Item" class="rounded-t-lg mx-auto"> -->
        <?php
        $sql = "SELECT COUNT(email) from users;";

        $result = $conn->query($sql);
        if ($result) {
          $row = $result->fetch_row();
          $count = $row[0];
          // Use $count as needed
        } else {
          // Handle the case where the query fails
        }
        ?>
        <a href="manageAccount.php" class=" font-semibold mt-4">
          <div class="p-10">
            <h2 class="text-xl font-raleway mb-2">Manage Account</h2>
            <p class="text-pink-500"> Click here to manage your account settings</p>

            <!-- <p class="text-pink-500 font-semibold mt-4">70 BDT</p> -->
            <div class="flex items-center mt-4">
              👥Total users: -
              <?php echo $count; ?>
            </div>
          </div>
        </a>
      </div>

      <div
        class="card text-center shadow-xl rounded-xl bg-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
        <a href="salesInfo.php">
          <div class="p-10">
            <h2 class="text-xl font-raleway mb-2">Get sales Info</h2>
            <p class="text-pink-500 font-semibold mt-4"> Click here to view sales information</p>
            <!-- 
          <div class="flex items-center justify-center mt-4">
            Total sales: - 1000
          </div> -->
          </div>
        </a>
      </div>


      <div
        class="card text-center shadow-xl rounded-xl bg-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">

        <a href="updateMenu.php">
          <div class="p-10">
            <h2 class="text-xl font-raleway mb-2">Update Menu</h2>
            <p class="text-pink-500 font-semibold mt-4">Click here to update your menu items</p>

            <div class="flex items-center justify-center mt-4">
              💰Total menu items:-
              <?php
              $sql = "SELECT COUNT(Item_Name) from FOOD_LIST;";

              $result = $conn->query($sql);
              if ($result) {
                $row = $result->fetch_row();
                echo $count = $row[0];
                // Use $count as needed
              } else {
                // Handle the case where the query fails
              }
              ?>
            </div>

          </div>
        </a>
      </div>
      <div
        class="card text-center shadow-xl rounded-xl bg-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
        <a href="orderHistory.php">
          <div class="p-10">
            <h2 class="text-xl font-raleway mb-2">Get all orders</h2>
            <p class="text-pink-500 font-semibold mt-4">Click here to view all orders</p>
          </div>
        </a>
      </div>
      <div
        class="card text-center shadow-xl rounded-xl bg-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
        <a href="sendNotification.php">
          <div class="p-10">
            <h2 class="text-xl font-raleway mb-2">Make Announcement</h2>
            <p class="text-pink-500 font-semibold mt-4">Click here to send notifications to users</p>
          </div>
        </a>
      </div>
    </div>
  </div>

  <!-- menu cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-10 rounded-3xl p-16 text-center">
  <?php
  $sql = "SELECT *, (SELECT units_sold FROM `SALES_REPORT` WHERE ItemID = `Food_List`.`id`) as `units_sold` FROM `Food_List`";
  $result = $conn->query($sql);

  //declare array to store the data of the database
  $row = [];

  if ($result->num_rows > 0) {
    // fetch all data from the database into an array
    $row = $result->fetch_all(MYSQLI_ASSOC);
  }

  if (!empty($row))
    foreach ($row as $rows) {
      $description = $rows["Description"];
      $truncatedDescription = strlen($description) > 60 ? substr($description, 0, 60) . '...' : $description;

      ?>
      <div
        class="card text-center shadow-xl rounded-xl bg-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
        <img src="<?php echo $rows["Image_url"]; ?>" alt="Menu Item" class="rounded-t-lg mx-auto h-60 w-full object-cover">
        <div class="p-10">
          <h2 class="text-xl font-raleway mb-2">
            <?php echo $rows["Item_Name"]; ?>
          </h2>
          <p id="description_<?php echo $rows["id"]; ?>" class="text-gray-700">
            <?php echo $truncatedDescription; ?>
            <?php if (strlen($description) > 60) { ?>
              <a href="#" class="text-blue-500 hover:text-blue-700 underline see-more-link"
                data-id="<?php echo $rows["id"]; ?>">See More</a>
            <?php } ?>
          </p>
          <p class="text-pink-500 font-semibold mt-4">
            <?php echo $rows["Price"]; ?> BDT
          </p>
          <div class="flex items-center mt-4">
            💰Total Sold:
            <?php echo $rows["units_sold"]; ?>
          </div>
        </div>
      </div>
    <?php }
  $conn->close();
  ?>
</div>


<script>
  // Get all the "See More" links
  var seeMoreLinks = document.getElementsByClassName('see-more-link');

  // Add click event listener to each link
  Array.from(seeMoreLinks).forEach(function(link) {
    link.addEventListener('click', function(e) {
      e.preventDefault();

      // Get the ID of the clicked link
      var itemId = this.getAttribute('data-id');

      // Get the description element by ID
      var descriptionElement = document.getElementById('description_' + itemId);

      // Toggle the display of the full description
      descriptionElement.classList.toggle('show-full-description');

      // Update the link text based on the description visibility
      if (descriptionElement.classList.contains('show-full-description')) {
        this.textContent = 'See Less';
      } else {
        this.textContent = 'See More';
      }
    });
  });
</script>


  <?php include('ui/footer.php'); ?>
</body>

</html>