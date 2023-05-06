<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Sales History</title>
    <link rel="stylesheet" href="outputstyles.css">
    <script src="https://cdn.tailwindcss.com"></script>



<body class="bg-pink-100 scroll-smooth font-semibold min-h-screen bg-cover bg-no-repeat w-full"
    style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">

    <!-- Navbar -->
    <nav class="bg-pink-700 bg-opacity-40 py-4 px-14">
        <div class="container mx-auto flex font-serif justify-between items-center px-4">
            <a href="#" class="text-gray-700 text-2xl font-bold">NSU Canteen</a>

            <div>
                <button
                    class="bg-pink-700 hover:bg-pink-50 hover:text-black text-white font-bold ml-5 py-3 px-5 float-right rounded-full focus:outline-black 
                                            focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow"
                    type="submit">Log Out</button>
            </div>
        </div>

    </nav>

    <div class="flex m-14">
        <!-- <h1 class="text-4xl mx-auto  text-center mb-8 ">Our Menu</h1> -->
        <!-- search bar -->
        <div class="px-20 mx-auto p-4 w-full">
            <label class="block text-gray-700 font-bold mb-2 " for="search">Search</label>
            <input
                class="border-2 border-gray-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                type="search" name="search" id="search">
        </div>


    </div>

    <!-- menu list view -->
    <ul class="grid grid-cols-1 gap-4 mx-auto my-28 container shadow-none p-16">
        <?php
        include('connection.php');
        include('protection.php');
        //join queue, order, bill, and users table
        $sql = "SELECT  `Orders`.`OrderID`, `Bill`.`Total_Amount`, `Bill`.`Order_Date`, `users`.`Name`AS `Customer_Name`,`users`.Email AS `Customer_Email`, `Orders`.Quantity, `food_list`.`Item_Name`, food_list.Price
        FROM `Orders`
        INNER JOIN food_list ON Orders.ItemID= food_list.id
        INNER JOIN `BILL` on `Orders`.`OrderID`=`BILL`.OrderID
        INNER JOIN `users`  ON `bill`.`CustomerID`= `users`.`id`
        ;";
        $result = $conn->query($sql);
        $current = 0;
        //fetch results and store in an array
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        //total number of results
        $length = count($rows);

        //print
        for ($index = 0; $index < $length; $index++) {
            $current = $index;
            ?>
            <li class="p-10 bg-pink-50 rounded-xl shadow-lg mb-4 overflow-hidden flex">
                <div class=" flex-grow">
                    <?php
                    //all items in the same Order Number will be served in one queue
                    //group items having same OrderID together
                        ?>
                        <h2>Order ID: <?php echo $rows[$current]['OrderID']?></h2>
                        </h3>
                        <h3 class="text-base font-bold text-gray-900 mb-1">
                            Date: <?php echo $rows[$current]["Order_Date"]; ?>
                        </h3>
                        <h3 class="text-base font-bold text-gray-900 mb-1">
                            Customer Name: <?php echo $rows[$current]["Customer_Name"]; ?>
                        </h3>
                        <p class="text-base font-bold text-gray-900 mb-1">
                            Customer Email:<?php echo $rows[$current]["Customer_Email"]; ?>
                        </p>
                        <?php
                    for ($j = $index; $j < $length; $j++) {
                        if ($rows[$j]["OrderID"] == $rows[$current]["OrderID"]) {
                            ?>
                            <h3 class="text-base font-bold text-gray-900 mb-1">
                                <?php echo $rows[$j]["Quantity"] . " x ";
                                echo $rows[$j]["Item_Name"];
                        }
                        if ($rows[$j + 1]["OrderID"] == $rows[$current]["OrderID"])
                            $index++;
                    } ?></h3>
                    <h3 class="text-base font-bold text-gray-900 mb-1">
                        Total Amount:
                        <?php echo $rows[$current]['Total_Amount']; ?> BDT
                    </h3>
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