<?php
include("../protection.php");
include("../connection.php");

if (isset($_POST['search'])) {
    $search = $_POST['search'];

    $start = mysqli_real_escape_string($conn, $_POST['start']);

    //fetch orderIDs for a user with user name or email
    $sql = "SELECT  `Bill`.*, `users`.`Name`AS `Customer_Name`,`users`.Email AS `Customer_Email`
          FROM `Bill`
          INNER JOIN `users`  ON `bill`.`CustomerID`= `users`.`id`
          WHERE users.email LIKE '%$search%' OR name LIKE '%$search%'
          ORDER BY OrderID DESC 
          ;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $html = "";
        while ($rows = mysqli_fetch_assoc($result)) {

            //Get all item details for current OrderID
            $getItems = "SELECT `Orders`.`OrderID`, `Bill`.`Total_Amount`, `Bill`.`Order_Date`, `users`.`Name`AS `Customer_Name`,`users`.Email AS `Customer_Email`, `Orders`.Quantity, `food_list`.`Item_Name`, food_list.Price
            FROM `Orders`
            INNER JOIN food_list ON Orders.ItemID= food_list.id
            INNER JOIN `BILL` on `Orders`.`OrderID`=`BILL`.OrderID
            INNER JOIN `users`  ON `bill`.`CustomerID`= `users`.`id`
            WHERE Orders.OrderID =" . $rows['OrderID'];
            $items = $conn->query($getItems);
            //Fetch all items for the current OrderID and store in an array
            $items = $items->fetch_all(MYSQLI_ASSOC);
            //Counting number of rows
            $length = count($items);


            $html .= "<li class='p-10 bg-pink-50 rounded-xl shadow-lg mb-4 overflow-hidden flex'>
                <div class='flex-grow'>";

            //all items in the same Order Number will be served in one queue
            //group items having same OrderID together

            $html .= "<h2>Order ID: " . $rows['OrderID'] . "</h2>
                        </h3>
                        <h3 class='text-base font-bold text-gray-900 mb-1'>
                            Date: " . $rows['Order_Date'] .
                "</h3>
            </h3>
                        <h3 class='text-base font-bold text-gray-900 mb-1'>
                            Customer Name: " . $rows['Customer_Name'] .
                "</h3>
            <h3 class='text-base font-bold text-gray-900 mb-1'>
                            Customer Email: " . $rows['Customer_Email'] .
                "</h3>";

            for ($index = 0; $index < $length; $index++) {
                $html .= "<h3 class='text-base font-bold text-gray-900 mb-1'>" .
                    $items[$index]['Quantity'] . " x " .
                    $items[$index]['Item_Name'] . "</h3>";

            }
            $html .= "<h3 class='text-base font-bold text-gray-900 mb-1'>
                     Total Amount: " . $rows['Total_Amount'] . " BDT
                  </h3>
                    </div>
                    </li>";

        }
        echo $html;
    }
}
?>