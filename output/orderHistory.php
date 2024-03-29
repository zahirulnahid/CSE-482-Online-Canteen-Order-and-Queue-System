<?php
        include('protection.php');
        ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
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
    style="background-image: url('images/Homepage bg .png'); backdrop-filter:blur(3px);">

    <!-- Navbar -->
 <?php include('ui/header.php'); ?>

    <div class="flex m-8">
        <!-- search bar -->
         <div class="px-20 mx-auto p-2 w-full">
            <label class="block text-gray-700 font-raleway mb-2 " for="search">Search</label>
            <input
                class="border-2 border-gray-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                type="search" name="search" id="search">
        </div> 
  <a href="adminDashboard.php" class="p-4 float-right mt-4 text-center hover:bg-gray-100 hover:text-gray-900 text-gray-100 bg-pink-700 rounded-full font-raleway
          hover:ring-pink-700 ring-2 hover:ring-2  hover:translate-0 hover:transition-shadow flex">Back to dashboard</a>
   
    </div>

    <!-- menu list view -->

     <h3 class="font-raleway text-4xl "><center>Order History</center></h3>
    <ul id="Orders" class="grid grid-cols-1 gap-4 mx-auto container shadow-none p-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

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
                jQuery('#Orders').append(result);
                loadFlag+=4;
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
        $('#Orders').html(response);
      }
    });
  });
});
</script>

</html>