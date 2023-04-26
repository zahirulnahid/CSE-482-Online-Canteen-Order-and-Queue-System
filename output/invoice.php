<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="outputstyles.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap" rel="stylesheet">
    

</head>

<body class="bg-pink-100 font-semibold min-h-screen bg-cover bg-no-repeat w-full"
    style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">



    <!-- Navbar -->
    <nav class="bg-gray-900 bg-opacity-40 py-4 px-14 z-10">
        <div class="container mx-auto flex font-raleway justify-between items-center px-4">
            <a href="homepage.php" class="text-gray-900 text-2xl font-raleway">NSU Canteen</a>

            <div>
                <a href="login.php" class="bg-pink-700 hover:bg-pink-50 hover:text-black text-white font-raleway py-3 px-5 rounded-full focus:outline-black 
                                focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow">Log
                    Out</a>
            </div>
        </div>
    </nav>


    <div class="bg-gray-300 shadow-xl rounded-lg bg-opacity-50 py-4 mx-auto my-28 px-14 h-full w-1/2">
       
        <div class="flex flex-col ">
            <div class="text-2xl text-gray-900 font-raleway mb-4">Cart</div>
            <ul class="flex-1 overflow-y-auto">
                <!-- Add items dynamically using JavaScript -->
                <?php
                    include("protection.php");
                    $sql= "SELECT cart.*, food_list.Item_Name, food_list.Price
                    FROM cart INNER JOIN food_list ON cart.foodID = food_list.id WHERE email='".$_SESSION["email"]."';";

                    $total= 0;

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $total += $row["Price"]* $row["quantity"];
                ?>
                <li class="flex justify-between items-center py-2 px-4 border-b border-gray-500">
                    <span class="text-gray-800 font-raleway"><?php echo $row["Item_Name"];?></span>
                    <span class="text-pink-700 font-raleway"><?php echo $row["Price"];?> BDT</span>
                    <div class="flex item mt-0.5">
                    <button onclick="updateCart('<?php echo $row['foodID'];?>', 'remove')" class="bg-pink-700 hover:bg-pink-50 hover:text-black
                     text-white font-raleway max-w-fit mr-1 py-1 px-2 rounded-md focus:outline-black
                                focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow mt-4">-</button>

                    <span id="quantity-<?php echo $row['foodID'];?>" class="text-pink-700 font-bold"><?php echo $row["quantity"];?> </span>

                    <button onclick="updateCart('<?php echo $row['foodID'];?>', 'add')" class="bg-pink-700 hover:bg-pink-50 hover:text-black
                     text-white font-raleway max-w-fit ml-1 py-1 px-2 rounded-md focus:outline-black 
                    focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow mt-4">+</button>
                    </div>
                </li>
                <?PHP 
                }}
                ?>
            </ul>
            <script>
        function updateCart(id, scope) {
      const xhr = new XMLHttpRequest();
      xhr.open("GET", "updatecart.php?foodID="+id+"&scope="+scope, true);
      console.log("ID: "+id+" scope: "+scope+"\n");
      xhr.onload = function(){
        if (xhr.status === 200) {
        console.log(xhr.responseText);
        const count = xhr.responseText;
        window.location.reload();
        // document.getElementById("quantity-"+id).textContent = count.toString();
    }
      };
      xhr.send();
    }
    </script>
            <div class="py-4 px-6 flex justify-between items-center">
                <span class="text-gray-800 font-raleway text-xl">Total:</span>
                <span class="text-pink-500 font-raleway text-xl"><?php echo $total;?> BDT</span>
            </div>
            <div class=" flex mx=auto m-5">
                   <button  class="bg-gray-100 hover:bg-pink-700 hover:text-white text-black font-raleway mx-auto py-3 px-5 m-4 rounded-full border-pink-600 focus:outline-black 
                                            focus:ring-2 focus:ring-pink-400 max-w-fit  hover:translate-0 hover:transition-shadow"
                type="submit"><a href="../output/homepage.php" >  Back to menu </a></button>

            <button class="bg-pink-700 hover:bg-gray-100 hover:text-black text-white font-raleway mx-auto  py-3 px-5 m-4 rounded-full  focus:outline-4 focus:outline-pink-700 
                                            focus:ring-2 focus:ring-pink-400 max-w-sm  hover:translate-0 hover:transition-shadow"
                type="submit"><a href="payment.php?price=<?php echo $total?>" >Proceed to Payment </a></button>
            </div>
          

        </div>
    </div>

</body>
<?php $conn->close();?>
</html>