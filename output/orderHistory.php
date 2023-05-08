<!DOCTYPE html>
<?php
        include('connection.php');
        include('protection.php');
        ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Sales History</title>
    <link rel="stylesheet" href="outputstyles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap"
    rel="stylesheet">
</head>



<body class="bg-pink-100 scroll-smooth font-raleway min-h-screen bg-cover bg-no-repeat w-full"
    style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">

    <!-- Navbar -->
 <?php include('ui/header.php'); ?>

    <div class="flex m-14">
        <!-- <h1 class="text-4xl mx-auto  text-center mb-8 ">Our Menu</h1> -->
        <!-- search bar -->
        <div class="px-20 mx-auto p-4 w-full">
            <label class="block text-gray-700 font-raleway mb-2 " for="search">Search</label>
            <input
                class="border-2 border-gray-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                type="search" name="search" id="search">
        </div>


    </div>

    <!-- menu list view -->
    <ul id="orders" class="grid grid-cols-1 gap-4 mx-auto my-28 container shadow-none p-16">

            <?php
        $conn->close();
        ?>

    </ul>


    <?php include ('ui/footer.php');?>


</body>
<script>
    var loadFlag=0;
    loadMore(loadFlag);
    function loadMore(start){
        jQuery.ajax({
            url: 'action/getAllOrders.php',
            data: 'start='+start,
            type: 'post',
            success:function(result){
                jQuery('#orders').append(result);
                loadFlag+=5;
            }
        });
    }
    jQuery(document).ready(function(){
        jQuery(window).scroll(function(){
            if(jQuery(window).scrollTop()>=jQuery(document).height()- jQuery(window).height()){
                loadMore(loadFlag);
            }
        });
    });
    $(document).ready(function() {
  $('#search').on('input', function() {
    var search = $(this).val();

    $.ajax({
      url: 'action/searchOrder.php',
      method: 'POST',
      data: { search: search },
      success: function(response) {
        // Update the DOM with the search results
        $('#orders').html(response);
      }
    });
  });
});
</script>

</html>