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
    <title>Pending Accounts</title>
    <link rel="stylesheet" href="outputstyles.css">
    <script src="https://cdn.tailwindcss.com"></script>



<body class="bg-pink-100 scroll-smooth font-raleway min-h-screen bg-cover bg-no-repeat w-full"
    style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">

    <!-- Navbar -->
    <?php include('ui/header.php'); ?>

    <div class="flex mb-10 p-10 ">
      <div class="flex flex-wrap justify-between items-center py-4 px-8 md:px-20">
      <!-- search bar -->
      <!-- <div class="w-full md:w-auto mb-4 md:mb-0">
        <label class="block text-gray-700 font-raleway mb-2" for="search">Search</label>
        <form method="post" class="flex items-center">
          <input
            class="border-2 border-gray-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 w-full md:w-auto mr-2"
            type="search" name="search" id="search">
          <button type="submit"
            class="p-3 bg-opacity-0 text-gray-100 hover:text-gray-800 rounded-full font-raleway focus:ring-2 hover:translate-0
            transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-150 hover:transition-shadow" allowfullscreen="" loading="lazy">
            <img src="../images/search.png" alt="Search" class="inline-block align-middle mr-2" height="30" width="30">
          </button>
        </form>
      </div>
 -->

       
        <!-- back to dashboard button -->
<a href="serverDashboard.php"
  class="p-4 float-none mx-auto mt-4 justify-center hover:bg-gray-100 hover:text-gray-900 text-gray-100 bg-pink-700 rounded-full font-raleway hover:ring-pink-700 ring-2 hover:ring-2  hover:translate-0 hover:transition-shadow block w-max">
  Back to dashboard
</a>      
      </div>
    </div>
        
         
    </div>

    <!-- pending accounts list view -->
    <ul class="grid grid-cols-1 gap-4 mx-auto my-18 px-20  container shadow-none">
        <?php
        include("connection.php");

        $sql = "SELECT * FROM `users` WHERE `verified`= 'pending';";
        $result = $conn->query($sql);

        //declare array to store the data of database
        $row = [];
        if ($result->num_rows > 0) {
            // fetch all data from db into array 
            $row = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            echo "No pending accounts";
        }
        if (!empty($row))
            foreach ($row as $rows) {
                ?>

                <li class="bg-gray-100 rounded-xl shadow-2xl mb-4 overflow-hidden flex">
                    <div class="p-5 flex-grow">
                        <h3 class="text-base font-raleway text-gray-900 mb-1">Name:
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

                        <a href="action/userHandle.php?id=<?php echo $rows["email"]; ?>&action=approve" class=" p-3 min-w-fit  m-3 float-right bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-white rounded-full font-raleway focus:ring-2 hover:ring-pink-700 hover:ring-2 hover:translate-0 
          hover:transition-shadow ">Approve</a>
                        <a href="action/userHandle.php?id=<?php echo $rows["email"]; ?>&action=delete&redirect=pendingAccount.php" class=" p-3 min-w-fit  m-3 float-right 
                         bg-white text-gray-900 hover:text-ehite hover:bg-pink-700 rounded-full font-raleway hover:text-white focus:ring-2 ring-2 ring-pink-700 hover:ring-white hover:ring-2 hover:translate-0 
          hover:transition-shadow">Decline</a>
                    </div>
                </li>
                <?php
            }
        $conn->close();
        ?>
    </ul>

    <?php include ('ui/footer.php');?>

</body>
</head>

</html>