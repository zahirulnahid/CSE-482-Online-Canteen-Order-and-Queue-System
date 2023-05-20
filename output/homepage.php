<?php
include('protection.php'); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
  <title>Home </title>
  <link rel="stylesheet" href="outputstyles.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap"
    rel="stylesheet">
</head>

<body class="bg-pink-100 font-semibold min-h-screen bg-cover bg-no-repeat w-full scroll-smooth"
  style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">

  <!-- NAVBAR -->

  <?php include('ui/header.php'); ?>

  <!-- Menu -->
  <div class="container mx-auto my-8 ">

    <h1 class="text-2xl mx-auto  text-center mb-8 ">Welcome,
      <?= $_SESSION["name"] ?>
    </h1>

    <div class="flex flex-wrap justify-between items-center py-4 px-8 md:px-20">
      <!-- search bar -->
      <div class="w-full md:w-auto mb-4 md:mb-0">
        <label class="block text-gray-700 font-raleway mb-2" for="search">Search</label>
        <form method="post" class="flex items-center">
          <input
            class="border-2 border-gray-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 w-full md:w-auto mr-2"
            type="search" name="search" id="search">
          <button type="submit" class="p-3 bg-opacity-0 text-gray-100 hover:text-gray-800 rounded-full font-raleway focus:ring-2 hover:translate-0
            transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-150 hover:transition-shadow"
            allowfullscreen="" loading="lazy">
            <img src="../images/search.png" alt="Search" class="inline-block align-middle mr-2" height="30" width="30">
          </button>
        </form>
      </div>


      <!-- cart button -->
      <div class="w-full md:w-auto">
        <a href="invoice.php" class="p-4 bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-white rounded-full font-raleway focus:ring-2 
        hover:ring-pink-700 hover:ring-2 hover:translate-0           hover:transition-shadow flex items-center">
          <img src="../images/shopping-cart.png" alt="Cart Icon" class="inline-block align-middle mr-2" height="24"
            width="24">
          <span class="mr-1">Cart (<span id="cart-count">
              <?php
              $sql = "SELECT sum(quantity)as `total` FROM cart where email='" . $_SESSION["email"] . "'";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo $row["total"];
                }
              } else {
                echo "0";
              }
              ?>
            </span>)</span>
        </a>

        <!-- my order button -->
        <a href="myOrders.php" class="p-4 mt-4 text-center bg-gray-100 text-gray-900 hover:text-gray-100 hover:bg-pink-700 rounded-full font-raleway
          ring-pink-700 ring-2 hover:ring-2 hover:ring-pink-100 hover:translate-0 hover:transition-shadow flex">My
          Orders</a>
      </div>
    </div>


    <!-- menu cards -->
    <!-- All items will be loaded in this div through lazy loading -->
    <div id="menu-cards"
      class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-10  rounded-3xl p-16 text-center">

    </div>

  </div>
  </div>
  <script>
   
var loadFlag = 0;
loadMore(loadFlag);

function loadMore(start) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var result = xhr.responseText;
      document.getElementById('menu-cards').innerHTML += result;
      
    }
  };
  xhr.open('GET', 'action/getMenu.php?start=' + start, true);
  xhr.send();
}
loadFlag += 4;console.log(loadFlag+"Load Flag Updated");
window.addEventListener('DOMContentLoaded', function () {
  window.addEventListener('scroll', function () {
    if (window.pageYOffset >= document.documentElement.scrollHeight - (window.innerHeight)) {
      loadMore(loadFlag);
      console.log("Called " + loadFlag);
    }
  });
});

notification();
    function addtocart(id) {
      const xhr = new XMLHttpRequest();
      xhr.open("GET", "action/addtocart.php?foodID=" + id);
      xhr.onload = function () {
        if (xhr.status === 200) {
          console.log(xhr.responseText);
          const count = xhr.responseText;
          document.getElementById("cart-count").innerHTML = "000";
          document.getElementById("cart-count").innerHTML = count.toString();
        }
      };
      xhr.send();
    }
    var x=<?php echo $notificationCount?>;
    function notification() {
      const xhr = new XMLHttpRequest();
      xhr.open("GET", "action/userHandle.php?action=notification");
      xhr.onload = function () {
        if (xhr.status === 200) {
          console.log(xhr.responseText);
          const text = xhr.responseText;
          const obj = JSON.parse(text);
          document.getElementById("notification-count").innerHTML = obj.count;
         if(x!=obj.count){main(obj.title,obj.details);x= obj.count;}
         console.log("Value of x: "+x);
        }
      };
      xhr.send();
    }
    function fetchData() {
    // Code for the method you want to execute
    notification()
  }
  setInterval(fetchData, 10000);
    $(document).ready(function () {
      $('#search').on('input', function () {
        var search = $(this).val();

        $.ajax({
          url: 'action/search.php',
          method: 'POST',
          data: { search: search },
          success: function (response) {
            // Update the DOM with the search results
            $('#menu-cards').html(response);
          }
        });
      });
    });

  </script>

  <?php include('ui/footer.php'); ?>
  <?php $conn->close(); ?>
</body>

</html>