<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
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

<body class=" scroll-smooth font-semibold min-h-screen bg-cover bg-no-repeat w-full"
    style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">


    <!-- Ready Orders view -->
    <h1 class="md:py-20 text-center text-3xl h-2 ">Orders Ready for pickup</h1>
    <ul class="grid sm:grid-cols-1 md:grid-cols-2 gap-4 mx-auto mt-10 my-28 container shadow-none md:px-32 py-10 sm:px-10">

    <?php 
        include("connection.php");
        // Get called orders
        $sql = "SELECT * FROM Queue WHERE counter IS NOT NULL";
        $result = $conn->Query($sql);
        if( $result== true){
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {?>
            <li class="p-10 bg-pink-50 rounded-xl shadow-lg mb-4 overflow-hidden flex">
                    <div class="flex-grow p-0">
                        <?php
                        $orderDetails = "SELECT BILL.*, users.id,users.name, users.email 
                        FROM BILL
                        INNER JOIN users ON BILL.CustomerID = users.id
                        WHERE OrderID = ". $row["OrderID"] .";";
                        $orderDetails = $conn->query($orderDetails);
                        //Fetch all items for the current OrderID and store in an array
                        $orderDetails = $orderDetails->fetch_assoc();
                        //Counting number of rows
                        //$length = count($items);
                        ?>
                        
                        <h3 class="text-base font-raleway text-gray-900 mb-1">
                            Name: <?php echo $orderDetails["name"] ?>
                        </h3>
                        <p class="text-base font-raleway text-gray-900 mb-1">
                            Email: <?php echo $orderDetails["email"] ?>
                        </p>
                        <h3 class="text-base font-raleway text-gray-900 mb-1">Queue No:
                            <?php echo $row['QueueNo'] ?>
                        </h3>
                        <h3 class="text-base font-raleway text-gray-900 mb-1">Order ID:
                            <?php echo $row["OrderID"] ?>
                        </h3>
                        <h1 class="text-base font-raleway text-gray-900 mb-1"><b>Counter No:
                            <?php echo $row["Counter"] ?></b>
                        </h1>
                        
                    </div>
                </li>
       <?php }}}
    ?>
    </ul>
    <!-- Queue list -->
    <h1 class="md:py-20 text-center text-3xl  h-2 ">Pending Orders</h1>
    <ul class="grid sm:grid-cols-1 md:grid-cols-2 gap-4 mx-auto mt-10 my-28 container shadow-none md:px-32 py-10 sm:px-10">

    <?php 
        // Get called orders
        $sql = "SELECT * FROM Queue WHERE counter IS NULL";
        $result = $conn->Query($sql);
        if( $result== true){
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {?>
            <li class="p-10 bg-pink-50 rounded-xl shadow-lg mb-4 overflow-hidden flex">
                    <div class="flex-grow p-0">
                        <?php
                        $orderDetails = "SELECT BILL.*, users.id,users.name, users.email 
                        FROM BILL
                        INNER JOIN users ON BILL.CustomerID = users.id
                        WHERE OrderID = ". $row["OrderID"] .";";
                        $orderDetails = $conn->query($orderDetails);
                        //Fetch all items for the current OrderID and store in an array
                        $orderDetails = $orderDetails->fetch_assoc();
                        //Counting number of rows
                        //$length = count($items);
                        ?>
                        
                        <h3 class="text-base font-raleway text-gray-900 mb-1">
                            Name: <?php echo $orderDetails["name"] ?>
                        </h3>
                        <p class="text-base font-raleway text-gray-900 mb-1">
                            Email: <?php echo $orderDetails["email"] ?>
                        </p>
                        <h3 class="text-base font-raleway text-gray-900 mb-1">Queue No:
                            <?php echo $row['QueueNo'] ?>
                        </h3>
                        <h3 class="text-base font-raleway text-gray-900 mb-1">Order ID:
                            <?php echo $row["OrderID"] ?>
                        </h3>                        
                    </div>
                </li>
       <?php }}}
    ?>
    </ul>



</body>


</html>