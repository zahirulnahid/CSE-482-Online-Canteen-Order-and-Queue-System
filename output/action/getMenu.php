<?php
include("../protection.php");
include("../connection.php");

//Implementation of lazy load
//start variable holds the number
$start = mysqli_real_escape_string($conn, $_GET['start']);

//fetch 4 items from food_list table
$sql = "SELECT * FROM `food_list` LIMIT $start, 4";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  $html = "";
  // output data of each row
  while ($row = $result->fetch_assoc()) {

    $html .= "<div
                class='card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105'>
                <img src=' " . $row['Image_url'] . "' alt='Menu Item' class='rounded-t-lg mx-auto h-60 w-full object-cover'>
                <div class='p-10'>
                  <h2 class='text-xl font-raleway mb-2'>
                    " . $row['Item_Name'] . "
                  </h2>
                  <p class='text-gray-700 max-h-45 '>
                      " . $row['Description'] . "
                  </p>
                  <p class='text-pink-500 font-semibold mt-4'>
                      " . $row['Price'] . "BDT
                  </p>
                  <div class='flex items-center mt-4'>
                    <button onClick='addtocart(" . $row['id'] . ")'
                      class='bg-pink-700 text-center mx-auto hover:bg-pink-400 hover:transition duration-200 ease-in-out text-white font-raleway py-2 px-4 rounded-full mt-4'>Add
                      to Cart</button>
                  </div>
                </div>
              </div>";

  }
  echo $html;
}


$conn->close();
?>