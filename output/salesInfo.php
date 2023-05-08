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
    <title>Sales Info</title>
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
    <nav class="bg-gray-900 bg-opacity-40 py-4 px-14">
        <div class="container mx-auto flex  justify-between items-center px-4">
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



    </div>

    <!-- menu list view -->
    <div class="container mx-auto px-20 m-16 ">
        <h1 class="text-2xl font-bold mb-6 text-center">Sales Report</h1>
        <div class="shadow-2xl ">
        <table class="table-auto w-full ">
            <thead>
                <tr class="bg-pink-700">
                    <th class="px-4 py-2 text-gray-200">Product Name</th>
                    <th class="px-4 py-2 text-gray-200">Units Sold</th>
                    <th class="px-4 py-2 text-gray-200">Price per Unit</th>
                    <th class="px-4 py-2 text-gray-200">Total Revenue</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('connection.php');

                $sql = "SELECT `SALES_REPORT`.*, `food_list`.`Item_Name`,`food_list`.`Price` 
                    FROM `SALES_REPORT`
                    INNER JOIN `food_list` ON `SALES_REPORT`.`ItemID`= `food_list`.`id`;
                    
                    ";
                $result = $conn->query($sql);

                //declare array to store the data of database
                $row = [];
                $total_Revenue = 0;
                if ($result->num_rows > 0) {
                    // fetch all data from db into array 
                    $row = $result->fetch_all(MYSQLI_ASSOC);
                }

                if (!empty($row))
                    foreach ($row as $rows) {
                        $total_Revenue += $rows['Total_Revenue'];
                        ?>
                        <tr class="bg-gray-100 text-center">
                            <td class="px-4 py-2 font-semibold">
                                <?php echo $rows['Item_Name']; ?>
                            </td>
                            <td class="px-4 py-2">
                                <?php echo $rows['Units_Sold']; ?>
                            </td>
                            <td class="px-4 py-2">
                                <?php echo $rows['Price']; ?> BDT
                            </td>
                            <td class="px-4 py-2 text-pink-600 font-semibold">
                                <?php echo $rows['Total_Revenue']; ?> BDT
                            </td>
                        </tr>
                    <?php } ?>
            </tbody>
            <tfoot>
                <tr class="bg-pink-700 m-4 text-center">
                    <td class="px-4 py-2 text-gray-200 p-4 font-bold">Total</td>
                    <td class="px-4 py-2 text-gray-200 p-4 font-raleway"></td>
                    <td class="px-4 py-2 text-gray-200 p-4 font-raleway"></td>
                    <td class="px-4 py-2 text-gray-200 p-4 font-bold ">
                        <?php echo $total_Revenue ?> BDT
                    </td>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>
    <?php
    $conn->close(); ?>

<footer class="bg-pink-600 text-white px-4 py-6">
  <div class="max-w-7xl mx-auto">
    <div class="flex flex-wrap justify-between">
      <div class="w-full md:w-1/3 lg:w-1/4 mb-6">
        <h3 class="text-lg font-medium mb-2">🚹 About Us:</h3>
        <p class="text-sm">📝 For the purpose of the CSE 482 & CSE 482 <br> Lab project, this website was developed <br> by us. <br><br> Thank you! 🤍</p>
      </div>
      <div class="w-full md:w-1/3 lg:w-1/4 mb-6">
        <h3 class="text-lg font-medium mb-2">🧑🏻‍💻 Our Services:</h3>
        <ul class="text-sm">
          <li><a href="#">✅ Universal Canteen Meal Ordering Portal</a></li>
          <li><a href="#">✅ Automate Canteen Meal Ordering</a></li>
          <li><a href="#">✅ Introduce Digital Payment</a></li>
          <li><a href="#">✅ Queue System to Save Time</a></li>
        </ul>
      </div>
      <div class="w-full md:w-1/3 lg:w-1/4 mb-6">
        <h3 class="text-lg font-medium mb-2">📩 Contact Us:</h3>
        <p class="text-sm">🌎 Bashundhara R\A; Dhaka, Bangladesh<br>📠 +880-2-55668200<br>📧 Mail Address - 482@nsu.com <br>🕐 Office Hours: Varsity Time </p>
      </div>
      <div class="w-full md:w-1/3 lg:w-1/4 mb-6">
        <h3 class="text-lg font-medium mb-2">🌐 Location:</h3>
        <div class="flex">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.098092052636!2d90.42298167501689!3d23.81511067862635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c64c103a8093%3A0xd660a4f50365294a!2sNorth%20South%20University!5e0!3m2!1sen!2sbd!4v1683553954593!5m2!1sen!2sbd" width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-6 border-t border-gray-700 pt-4 flex justify-between items-center">
    <p class="text-sm">&copy; 2023 CSE™️   All Rights Reserved ✔️</p>
    <ul class="flex text-sm">
      <li class="mr-4"><a href="#">📑 Terms of Service</a></li>
      <li class="mr-4"><a href="#">🔏 Privacy Policy</a></li>
    </ul>
  </div>
</footer>

</body>
</head>

</html>