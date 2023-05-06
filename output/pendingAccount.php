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
    <nav class="bg-gray-900 bg-opacity-40 py-4 px-14">
        <div class="container mx-auto flex font-raleway justify-between items-center px-4">
            <a href="#" class="text-gray-800 text-2xl font-bold">NSU Canteen</a>

            <div>
                <button
                    class="bg-pink-700 hover:bg-pink-50 hover:text-black text-white font-raleway py-3 px-5 rounded-full focus:outline-black 
                                            focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow"
                    type="submit">Log Out</button>
            </div>
        </div>

    </nav>

    <div class="flex m-14">
        <!-- <h1 class="text-4xl mx-auto  text-center mb-8 ">Our Menu</h1> -->
        <!-- search bar -->
        <div class="px-20 my-4 p-4 w-full float-left">
            <label class="block text-gray-700 font-raleway mb-2 " for="search">Search</label>
            <input
                class="border-2 border-gray-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                type="search" name="search" id="search">
        </div>


    </div>

    <!-- menu list view -->
    <ul class="grid grid-cols-1 gap-4 mx-auto my-18 p-10 container shadow-none">
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

                <li class="bg-pink-50 rounded-xl shadow-lg mb-4 overflow-hidden flex">
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

                        <a href="approveAccount.php?id=<?php echo $rows["email"]; ?>" class=" p-3 min-w-fit  m-3 float-right bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-gray-200 rounded-full border-spacing-2
                            font-raleway focus:ring-2 hover:translate-0 hover:transition-shadow">Approve</a>
                        <a href="deleteAccount.php?id=<?php echo $rows["email"]; ?>&redirect=pendingAccount.php" class=" p-3 min-w-fit  m-3 float-right bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-gray-200 rounded-full border-spacing-2
                font-raleway focus:ring-2 hover:translate-0 hover:transition-shadow">Decline</a>
                    </div>
                </li>
                <?php
            }
        $conn->close();
        ?>
    </ul>
</body>
</head>

</html>