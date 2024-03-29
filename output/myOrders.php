<?php
include('protection.php');
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>My Orders</title>
    <link rel="stylesheet" href="outputstyles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap"
    rel="stylesheet">
</head>



<body class=" scroll-smooth font-semibold min-h-screen bg-cover bg-no-repeat w-full"
    style="background-image: url('images/Homepage bg .png'); backdrop-filter:blur(3px);">

    <!-- Navbar -->
    <?php include('ui/header.php'); ?>

    <div class="flex mx-auto justify-end m-10 sm:px-6 md:px-14 ">
          <a href="homepage.php" class="bg-gray-100 mx-auto hover:bg-pink-700 hover:text-white text-black font-raleway py-3 px-5 m-4 rounded-full ring-pink-600 ring-2
           hover:ring-2 hover:ring-pink-100 max-w-fit hover:translate-0 hover:transition-shadow md:mx-2">
          Back to menu
        </a>
    </div>

    <ul id="Orders" class="grid sm:grid-cols-1 md:grid-cols-2 gap-4 mx-auto mt-10 my-28 container shadow-none md:px-20 py-10 sm:px-">
        
       
        <h2 class=" text-lg font-raleway text-gray-900 mb-1">
            Customer Name:
            <?php echo $_SESSION['name']; ?>
        </h2>
        <h2 class="text-lg font-raleway text-gray-900 mb-1">
            Customer Email:
            <?php echo $_SESSION['email']; ?>
        </h2>
          
        
    </ul>

    <?php include ('ui/footer.php');?>

</body>
<script>
    var loadFlag = 0;
    loadMore(loadFlag);
    function loadMore(start) {
        jQuery.ajax({
            url: 'action/getOrders.php',
            data: 'start=' + start,
            type: 'post',
            success: function (result) {
                jQuery('#Orders').append(result);
                loadFlag += 4;
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