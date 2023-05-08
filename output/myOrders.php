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

    <?php include ('ui/footer.php');?>

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