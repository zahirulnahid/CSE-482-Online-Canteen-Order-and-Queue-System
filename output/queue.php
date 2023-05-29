
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Queue </title>
    <link rel="stylesheet" href="outputstyles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap"
        rel="stylesheet">
</head>

<nav class="bg-pink-700 py-4 px-4 sm:px-6 md:px-14 z-10">
    <div class="container mx-auto flex justify-between items-center">
        <button onClick="history.back()" class="text-gray-100 text-2xl border-white font-fatface">NSU Canteen</button>
        <div class="relative flex items-center">
            <button onClick="history.back()"
                class=" flex justify-center items-center bg-gray-100 hover:bg-pink-700 hover:text-white text-black font-raleway py-3 px-5 rounded-full hover:ring-2 hover:ring-white hover:translate-0 hover:transition-shadow ml-4">Back</button>
            <?php
            if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                ?>
                <a href="login.php"
                    class=" flex justify-center items-center bg-gray-100 hover:bg-pink-700 hover:text-white text-black font-raleway py-3 px-5 rounded-full hover:ring-2 hover:ring-white hover:translate-0 hover:transition-shadow ml-4">
                    <i class="fas fa-sign-out-alt"></i> Log Out
                </a>
            <?php } ?>
        </div>
    </div>
</nav>

<body class=" scroll-smooth font-semibold min-h-screen bg-cover bg-no-repeat w-full"
    style="background-image: url('images/Homepage bg .png'); backdrop-filter:blur(3px);">


    <!-- Ready Orders view -->
    <h1 class="my-5 text-center text-3xl h-2 ">Orders Ready for pickup</h1>
    <ul class="grid sm:grid-cols-1 md:grid-cols-3 gap-4 mx-auto container shadow-none md:px-20 py-5 sm:px-10">

        <?php
        include("connection.php");
        // Get called Orders
        $sql = "SELECT * FROM Queue WHERE counter IS NOT NULL";
        $result = $conn->Query($sql);
        if ($result == true) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <li class="p-2 bg-pink-50 rounded-xl shadow-lg overflow-hidden flex">
                        <div class="flex-grow p-0">
                            <?php
                            $orderDetails = "SELECT BILL.*, users.id,users.name, users.email 
                        FROM BILL
                        INNER JOIN users ON BILL.CustomerID = users.id
                        WHERE OrderID = " . $row["OrderID"] . ";";
                            $orderDetails = $conn->query($orderDetails);
                            //Fetch all items for the current OrderID and store in an array
                            $orderDetails = $orderDetails->fetch_assoc();
                            //Counting number of rows
                            //$length = count($items);
                            ?>

                            <h3 class="text-base font-raleway text-gray-900 mb-1">
                                Name:
                                <?php echo $orderDetails["name"] ?>
                            </h3>
                            <p class="text-base font-raleway text-gray-900 mb-1">
                                Email:
                                <?php echo $orderDetails["email"] ?>
                            </p>
                            <h3 class="text-base font-raleway text-gray-900 mb-1">Queue No:
                                <?php echo $row['QueueNo'] ?>
                            </h3>
                            <h3 class="text-base font-raleway text-gray-900 mb-1">Order ID:
                                <?php echo $row["OrderID"] ?>
                            </h3>
                            <h1 class="text-base font-raleway text-gray-900 mb-1"><b>Counter No:
                                    <?php echo $row["Counter"] ?>
                                </b>
                            </h1>

                        </div>
                    </li>
                <?php }
            }
        }
        ?>
    </ul>
    <!-- Queue list -->
    <h1 class="md:py-5 text-center text-3xl  h-2 ">Pending Orders</h1>
    <ul class="grid sm:grid-cols-1 md:grid-cols-3 gap-4 mx-auto container shadow-none md:px-20 py-5 sm:px-10">

        <?php
        // Get called Orders
        $sql = "SELECT * FROM Queue WHERE counter IS NULL";
        $result = $conn->Query($sql);
        if ($result == true) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <li class="p-2 bg-pink-50 rounded-xl shadow-lg overflow-hidden flex">
                        <div class="flex-grow p-0">
                            <?php
                            $orderDetails = "SELECT BILL.*, users.id,users.name, users.email 
                        FROM BILL
                        INNER JOIN users ON BILL.CustomerID = users.id
                        WHERE OrderID = " . $row["OrderID"] . ";";
                            $orderDetails = $conn->query($orderDetails);
                            //Fetch all items for the current OrderID and store in an array
                            $orderDetails = $orderDetails->fetch_assoc();
                            //Counting number of rows
                            //$length = count($items);
                            ?>

                            <h3 class="text-base font-raleway text-gray-900 mb-1">
                                Name:
                                <?php echo $orderDetails["name"] ?>
                            </h3>
                            <p class="text-base font-raleway text-gray-900 mb-1">
                                Email:
                                <?php echo $orderDetails["email"] ?>
                            </p>
                            <h3 class="text-base font-raleway text-gray-900 mb-1">Queue No:
                                <?php echo $row['QueueNo'] ?>
                            </h3>
                            <h3 class="text-base font-raleway text-gray-900 mb-1">Order ID:
                                <?php echo $row["OrderID"] ?>
                            </h3>
                        </div>
                    </li>
                <?php }
            }
        }
        ?>
    </ul>



</body>


</html>