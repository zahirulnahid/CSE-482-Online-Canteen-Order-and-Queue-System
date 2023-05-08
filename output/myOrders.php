<!DOCTYPE html>
<?php
include('protection.php');
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <title>My Orders</title>
    <link rel="stylesheet" href="outputstyles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap"
    rel="stylesheet">
</head>



<body class="bg-pink-100 scroll-smooth font-semibold min-h-screen bg-cover bg-no-repeat w-full"
    style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">

    <!-- Navbar -->
    <nav class="bg-pink-700 bg-opacity-40 py-4 px-14">
        <div class="container mx-auto flex font-raleway justify-between items-center px-4">
            <a href="#" class="text-gray-700 text-2xl font-raleway">NSU Canteen</a>

            <div>
                <button
                    class="bg-pink-700 hover:bg-pink-50 hover:text-black text-white font-raleway ml-5 py-3 px-5 float-right rounded-full focus:outline-black 
                                            focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow"
                    type="submit">Log Out</button>
            </div>
        </div>

    </nav>

    <!-- menu list view -->
    <ul id="orders" class="grid grid-cols-1 gap-4 mx-auto my-28 container shadow-none p-16">

        <h3 class="text-base font-raleway text-gray-900 mb-1">
            Customer Name:
            <?php echo $_SESSION['name']; ?>
        </h3>
        <p class="text-base font-raleway text-gray-900 mb-1">
            Customer Name:
            <?php echo $_SESSION['email']; ?>
        </p>
    </ul>

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
<script>
    var loadFlag = 0;
    loadMore(loadFlag);
    function loadMore(start) {
        jQuery.ajax({
            url: 'getOrders.php',
            data: 'start=' + start,
            type: 'post',
            success: function (result) {
                jQuery('#orders').append(result);
                loadFlag += 5;
            }
        });
    }
    jQuery(document).ready(function () {
        jQuery(window).scroll(function () {
            if (jQuery(window).scrollTop() >= jQuery(document).height() - jQuery(window).height()) {
                loadMore(loadFlag);
            }
        });
    });
</script>

</html>