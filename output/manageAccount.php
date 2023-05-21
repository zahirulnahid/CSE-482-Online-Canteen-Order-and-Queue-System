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
    <title>Manage Account</title>
    <link rel="stylesheet" href="outputstyles.css">
    <script src="https://cdn.tailwindcss.com"></script>


<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap"
    rel="stylesheet">
</head>


<body class="bg-pink-100 scroll-smooth font-raleway min-h-screen bg-cover bg-no-repeat w-full"
    style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">

    <!-- Navbar -->
 <?php include('ui/header.php'); ?>





    <!-- menu list view -->
    <div class="container mx-auto my-8">

        <div class="flex m-10">
        <!-- <h1 class="text-4xl mx-auto  text-center mb-8 ">Our Menu</h1> -->
        <!-- search bar -->
        <div class="px-20 w-full float-left">
            <!-- <label class="block text-gray-700 font-bold mb-2 " for="search">Search</label>
            <input
                class="border-2 border-gray-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                type="search" name="search" id="search"> -->

                
            <a href="serverDashboard.php" class="p-4 float-right mt-4 text-center hover:bg-gray-100 hover:text-gray-900 text-gray-100 bg-pink-700 rounded-full font-raleway
          hover:ring-pink-700 ring-2 hover:ring-2  hover:translate-0 hover:transition-shadow flex">Back to dashboard</a>
      

        </div>


    </div>

    <ul class="grid grid-cols-1 sm:grid-cold-2 md:grid-cols-3 gap-4 mx-auto my-18 p-28 pt-5">
        <?php
        include('connection.php');

        $sql = "SELECT users.*, user_category.id, user_category.category 
        FROM `users` 
        INNER JOIN user_category ON users.category = user_category.id
        WHERE users.verified ='true';";
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
                <li class="bg-gray-100 rounded-xl shadow-2xl mb-4 overflow-hidden flex">

                    <div class="p-5 flex-grow">
                        <h3 class="text-base font-bold text-gray-900 mb-1">Name:
                            <?php echo $rows["name"]; ?>
                        </h3>
                        <p class="text-gray-700 font-medium">Email:
                            <?php echo $rows["email"]; ?>
                        </p>
                        <p class="text-gray-700 font-medium">Phone:
                            <?php echo $rows["phone"]; ?>
                        </p>
                        <p class="text-gray-700 font-medium">Category:
                            <?php echo $rows["category"]; ?>
                        </p>

                        <a href="action/userHandle.php?id=<?php echo $rows["email"]; ?>&redirect=manageAccount.php&action=delete" name="delete"
                            value="Delete Account" class=" p-3 min-w-fit  m-3 float-right bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-white rounded-full font-raleway focus:ring-2 hover:ring-pink-700 hover:ring-2 hover:translate-0 
          hover:transition-shadow ">Delete</a>

                    </div>

                </li>

            <?php }
        $conn->close();
        ?>
    </ul>
    </div>

    <?php include ('ui/footer.php');?>

</body>


</html>