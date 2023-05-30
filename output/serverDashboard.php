<?php
include("protection.php");
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Server Dashboard</title>
    <link rel="stylesheet" href="outputstyles.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap"
        rel="stylesheet">
</head>



<body class="bg-pink-100 scroll-smooth font-semibold min-h-screen bg-cover bg-no-repeat" style="background-image: url('images/Homepage bg .webp'); backdrop-filter: blur(3px);">

    <!-- Navbar -->
    <?php include('ui/header.php'); ?>

    <div class="flex flex-col items-center m-6 md:m-14">
        <!-- search bar -->
        <div class="w-full md:w-2/3 px-4">
            <label class="block text-gray-700 font-raleway mb-2" for="search">Search</label>
            <input
                class="border-2 border-gray-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 w-full"
                type="search" name="search" id="search">
        </div>
    </div>

    <!-- Queue list view -->
    <ul class="grid grid-cols-1 gap-4 container mx-auto p-4 md:p-10">
        <?php
        include('connection.php');

        $sql = "SELECT `users`.`Name` AS `Customer_Name`, `users`.Email AS `Customer_Email`, `BILL`.*
            FROM `BILL`
            INNER JOIN `users` ON `BILL`.`CustomerID` = `users`.`id`
            WHERE BILL.served = 'no'
            ORDER BY BILL.OrderID DESC;";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <li class="p-4 bg-pink-50 rounded-xl shadow-lg mb-4 overflow-hidden flex flex-col md:flex-row items-start">
                    <div class="flex-grow">
                        <?php
                        $items = "SELECT `Queue`.*, `users`.`Name` AS `Customer_Name`, `users`.Email AS `Customer_Email`, `Orders`.Quantity, `BILL`.served, `food_list`.`Item_Name`
        FROM `Orders`
        INNER JOIN food_list ON Orders.ItemID = food_list.id
        INNER JOIN `Queue` ON `Orders`.OrderID = `Queue`.OrderID
        INNER JOIN `BILL` ON `Orders`.`OrderID` = `BILL`.OrderID
        INNER JOIN `users` ON `BILL`.`CustomerID` = `users`.`id`
        WHERE BILL.served = 'no' AND Queue.OrderID = " . $row['OrderID'] . "
        ORDER BY OrderID DESC; ";
                        $items = $conn->query($items);
                        //Fetch all items for the current OrderID and store in an array
                        $items = $items->fetch_all(MYSQLI_ASSOC);
                        //Counting number of rows
                        $length = count($items);

                        for ($i = 0; $i < $length; $i++) { ?>
                            <h3 class="text-base font-raleway text-gray-900 mb-1">
                                <?php echo $items[$i]["Quantity"] . ' x ' . $items[$i]["Item_Name"] ?>
                            </h3>
                        <?php } ?>
                        <h3 class="text-base font-raleway text-gray-900 mb-1">
                            <?php echo $items[0]["Customer_Name"] ?>
                        </h3>
                        <p class="text-base font-raleway text-gray-900 mb-1">
                            <?php echo $items[0]["Customer_Email"] ?>
                        </p>
                        <h3 class="text-base font-raleway text-gray-900 mb-1">Queue No:
                            <?php echo $items[0]['QueueNo'] ?>
                        </h3>
                        <h3 class="text-base font-raleway text-gray-900 mb-1">Order ID:
                            <?php echo $row["OrderID"] ?>
                        </h3>
                    </div>
                    <div class="mt-4 md:mt-0">
                        Counter:
                        <input type="text" list="counterNo" name="counter"class="ring-2 ring-pink-700 rounded-full p-2" required>
                        <datalist id="counterNo">
                            <option value="1">
                            <option value="2">
                            <option value="3">
                            <option value="4">
                            <option value="5">
                        </datalist>
                        <a href="action/removeQueue.php?QueueID=<?php echo $items[0]["QueueNo"] ?>&OrderID=<?php echo $row["OrderID"] ?>"
                            class="p-2 min-w-fit bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-pink-100 rounded-full font-raleway focus:ring-2 hover:translate-0 hover:transition-shadow">Served</a>
                        <button
                            onClick="callCustomer(document.getElementsByName('counter')[0].value, <?php echo $row["OrderID"] ?>, <?php echo $_SESSION['id']; ?>,<?php echo $row["CustomerID"]; ?>)"
                            class="p-2 min-w-fit mt-2 md:mt-0 ml-0 md:ml-2 bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-pink-100 rounded-full font-raleway focus:ring-2 hover:translate-0 hover:transition-shadow">Call</button>
                    </div>
                </li>
            <?php }
        } else {
            echo "No Pending Orders.";
        }

        $conn->close();
        ?>
    </ul>
</body>


    <script>
        function callCustomer(counter, orderID, staffID, customerID) {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "action/call.php?counter=" + counter + "&OrderID=" + orderID + "&sid=" + staffID + "&cid=" + customerID);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);

                }
            }
            xhr.send();
        }
    </script>
</body>
<?php include('ui/footer.php'); ?>

</html>