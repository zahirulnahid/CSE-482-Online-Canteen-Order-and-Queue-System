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



<body class=" scroll-smooth font-semibold min-h-screen bg-cover bg-no-repeat w-full"
    style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">

    <!-- Navbar -->
    <?php include('ui/header.php'); ?>

    <!-- menu list view -->
    <ul id="orders" class="grid sm:grid-cols-1 md:grid-cols-2 gap-4 mx-auto mt-10 my-28 container shadow-none md:px-32 py-10 sm:px-10">

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
                jQuery('#orders').append(result);
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