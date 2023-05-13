<?php
include("protection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Successful</title>
  <!-- Import Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.15/tailwind.min.css"
    integrity="sha512-cPHJ9+o07HHJdL+WqkK1V+gUXsImw1H7ZKsJdPvmG+TQ2Q2K7yLlWJf0KxG2Q6JvZzCtkW8mkXkKjJcB/IO/ew=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap"
    rel="stylesheet">
</head>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $paystatus = $_POST['pay_status'];

  $amount = $_POST['amount'];
  $customerName = $_POST['cus_name'];
  $cardNumber = $_POST['card_number'];
  $time = $_POST['pay_time'];
  $cardType = $_POST['card_type'];

  //you can get all parameter from post request
  // print_r($_POST);
}
//Creating Bill and Order
include('connection.php');

$sql = "SELECT `id` FROM `users` WHERE `email`= '" . $_SESSION['email'] . "';";
if ($conn->query($sql) == true) {
  $userid = $conn->query($sql)->fetch_assoc();
  $userid = $userid['id'];
} else {
  echo "Cannot retrieve userID";
}

$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
$date = $dt->format('Y-m-d');
$orderTime = $dt->format('g:i a');
$bill = "INSERT INTO `BILL`( `Order_Date`, `Time`, `CustomerID`, `Total_Amount`) VALUES ('$date', '$orderTime', '$userid','$amount');";
if ($conn->query($bill) == TRUE) {
  $order_id = mysqli_insert_id($conn);

  $getItem = "SELECT cart.*, food_list.Item_Name, food_list.Price
  FROM cart INNER JOIN food_list ON cart.foodID = food_list.id WHERE email='" . $_SESSION["email"] . "';";
  $result = $conn->query($getItem);
  if ($result == true) {
    while ($row = $result->fetch_assoc()) {
      $order = "INSERT INTO `Orders`(`OrderID`, `ItemID`, `Quantity`, `served`) VALUES ('$order_id','" . $row["foodID"] . "','" . $row["quantity"] . "', 'no');";
      $updateSales = "INSERT INTO SALES_REPORT (`ItemID`, `Units_Sold`, `Total_Revenue`) 
      VALUES
       ('" . $row["foodID"] . "','" . $row["quantity"] . "', " . $row["quantity"] * $row["Price"] . ")
      ON DUPLICATE KEY UPDATE
        Units_Sold     =  (Units_Sold + '" . $row['quantity'] . "'),
        Total_Revenue =  (Total_Revenue + (" . $row['quantity'] * $row['Price'] . "))";
      $deleteCartItems = "DELETE FROM `cart` WHERE `email`='" . $_SESSION['email'] . "';";
      $addQueue = "INSERT INTO `QUEUE`( `OrderID`) VALUES ($order_id);";
      if ($conn->query($order) == true && $conn->query($updateSales) == true && $conn->query($deleteCartItems) && $conn->query($addQueue)) {
      }

    }
  }
}
?>


<body class="bg-pink-100 font-raleway min-h-screen bg-cover bg-no-repeat w-full"
  style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">


  <!-- navbar -->
  <?php include('ui/header.php'); ?>



  <div class="container mx-auto px-20 py-10">
    <div class="bg-gray-100 rounded-lg shadow-2xl p-8">
      <div class="flex items-center justify-center">
        <svg class="w-12 h-12 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
          fill="currentColor">
          
        </svg>
        <h1 class="text-2xl font-bold text-pink-600">Payment
          
        </h1>
      </div>
      <h3 class="mt-4 text-gray-600">Thank you for your payment
         Your transaction details:.
      </h3>

      <p class="mt-4 pl-4 text-gray-600">

        <li class="mt-4 p-4 text-pink-600">Amount :
         
        </li>
        <li class="mt-4 p-4 text-pink-600">Payment Type :
          
        </li>
        <li class="mt-4 p-4 text-pink-600">Card Number :
          
        </li>
        <li class="mt-4 p-4 text-pink-600">Time :
         
        </li>


      </p>
      <div class="mt-6 flex justify-end">
        <a href="./homepage.php"
          class="bg-pink-500 hover:bg-pink-600 text-white font-raleway py-2 px-4 rounded-full">Continue Shopping</a>
      </div>
    </div>
  </div>
  <?php include('ui/footer.php'); ?>
</body>

</html>