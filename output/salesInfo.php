<?php
include("protection.php");
?>

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

        <a href="adminDashboard.php" class="p-4 mt-4 text-center hover:bg-gray-100 hover:text-gray-900 text-gray-100 bg-pink-700 rounded-full font-raleway
          hover:ring-pink-700 ring-2 hover:ring-2  hover:translate-0 hover:transition-shadow flex">Back to
            dashboard</a>



    </div>

    <!-- sales list view -->
    <div class="container mx-auto px-4 sm:px-8 md:px-16 lg:px-20 m-4 sm:m-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Sales Report</h1>
        <div class="shadow-lg overflow-x-auto">

            <?php
            include('connection.php');

            $sql = "SELECT
                MONTH(b.Order_Date) AS month,
                YEAR(b.Order_Date) AS year,
                f.Item_Name AS Item_Name,
                f.Price as Price,
                SUM(o.Quantity) AS Units_Sold,
                SUM(o.Quantity * o.Price) AS Total_Revenue
            FROM
                food_list f
            INNER JOIN
                Orders o ON f.id = o.itemID
            INNER JOIN
                BILL b ON o.OrderID = b.OrderID
            GROUP BY
                month, year, Item_Name
            Order BY
                year DESC, month DESC
              ";
            $result = $conn->query($sql);

            // Check if the query was successful
            if ($result === false) {
                echo "Error executing the query: " . $conn->error;
                exit;
            }

            // Loop through the results and display separate tables for each month
            $currentMonth = null;
            while ($row = $result->fetch_assoc()) {
                $monthYear = date('F Y', strtotime($row['month'] . '/1/' . $row['year']));
                if ($currentMonth != $monthYear) {                    
                    // Start a new table for the month
                    if ($currentMonth !== null) {
                        echo '</tbody><tfoot>
                             <tr class="bg-pink-700 text-center">
                                 <td class="px-4 py-2 text-gray-200 font-bold">Total</td>
                                 <td></td>
                                 <td></td>
                                 <td class="px-4 py-2 text-gray-200 font-bold">
                                    ' . $total_Revenue . ' BDT
                                 </td>
                             </tr>
                         </tfoot></table>'; // Close the previous table
                    }
                    $total_Revenue = 0;
                    echo '<h2 class="text-2xl font-bold mb-6 text-center">' . $monthYear . '</h2>';
                    echo '<table class="w-full mb-10">';
                    echo '<thead>';
                    echo '<tr class="bg-pink-700">';
                    echo '<th class="px-4 py-2 text-gray-200">Product Name</th>';
                    echo '<th class="px-4 py-2 text-gray-200">Price</th>';
                    echo '<th class="px-4 py-2 text-gray-200">Total Quantity</th>';
                    echo '<th class="px-4 py-2 text-gray-200">Revenue</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    $currentMonth = $monthYear;
                }
                // Display the data in the current table
                echo "<tr class='bg-gray-100 text-center'>";
                echo '<td class="px-4 py-2 font-semibold">' . $row['Item_Name'] . '</td>';
                echo '<td class="px-4 py-2 font-semibold">' . $row['Price'] . '</td>';
                echo '<td class="px-4 py-2 font-semibold">' . $row['Units_Sold'] . '</td>';
                echo '<td class="px-4 py-2 font-semibold">' . $row['Total_Revenue'] . ' BDT </td>';
                $total_Revenue += $row["Total_Revenue"];
                echo '</tr>';

            }
            echo '</tbody><tfoot>
                 <tr class="bg-pink-700 text-center">
                     <td class="px-4 py-2 text-gray-200 font-bold">Total</td>
                     <td></td>
                     <td></td>
                     <td class="px-4 py-2 text-gray-200 font-bold">
                        ' . $total_Revenue . ' BDT
                     </td>
                 </tr>
             </tfoot></table>'; // Close the last table
            
            // Close the database connection
            $conn->close();
            ?>
            <?php include('ui/footer.php'); ?>

</body>
</head>

</html>