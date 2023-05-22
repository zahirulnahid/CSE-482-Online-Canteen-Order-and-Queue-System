<?php
include("protection.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Sales Info</title>
    <link rel="stylesheet" href="outputstyles.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap"
    rel="stylesheet">
</head>



<body class="bg-pink-100 scroll-smooth font-raleway min-h-screen bg-cover bg-no-repeat w-full "
    style="background-image: url('images/Homepage bg .png'); backdrop-filter:blur(3px);">

    <!-- Navbar -->
   <?php include('ui/header.php'); ?>


    <div class="flex m-14">
          
            <a href="serverDashboard.php" class="p-4 mt-4 text-center hover:bg-gray-100 hover:text-gray-900 text-gray-100 bg-pink-700 rounded-full font-raleway
          hover:ring-pink-700 ring-2 hover:ring-2  hover:translate-0 hover:transition-shadow flex">Back to dashboard</a>
      


    </div>

    <!-- sales list view -->
   <div class="container mx-auto px-4 sm:px-8 md:px-16 lg:px-20 m-4 sm:m-8">
    <h1 class="text-2xl font-bold mb-6 text-center">Sales Report</h1>
    <div class="shadow-lg overflow-x-auto">
        <table class="w-full">
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
                    INNER JOIN `food_list` ON `SALES_REPORT`.`ItemID`= `food_list`.`id`;";
                $result = $conn->query($sql);

                $row = [];
                $total_Revenue = 0;
                if ($result->num_rows > 0) {
                    $row = $result->fetch_all(MYSQLI_ASSOC);
                }

                if (!empty($row)) {
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
                    <?php }
                } ?>
            </tbody>
            <tfoot>
                <tr class="bg-pink-700 text-center">
                    <td class="px-4 py-2 text-gray-200 font-bold">Total</td>
                    <td></td>
                    <td></td>
                    <td class="px-4 py-2 text-gray-200 font-bold">
                        <?php echo $total_Revenue ?> BDT
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

    <?php
    $conn->close(); ?>

<?php include ('ui/footer.php');?>

</body>
</head>

</html>