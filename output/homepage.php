<?php 
include('protection.php');?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Home </title>
    <link rel="stylesheet" href="outputstyles.css">
        <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-pink-100 font-semibold min-h-screen bg-cover bg-no-repeat w-full scroll-smooth"
    style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">



    <!-- Navbar -->
    <nav class="bg-gray-900 bg-opacity-40 py-4 px-14 z-10">
        <div class="container mx-auto flex font-bold justify-between items-center px-4">
            <a href="homepage.php" class="text-gray-900 text-2xl font-bold">NSU Canteen</a>

            <div>
                <a href="login.php" class="bg-pink-700 hover:bg-pink-50 hover:text-black text-white font-bold py-3 px-5 rounded-full focus:outline-black 
                                focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow">Log
                    Out</a>
            </div>
        </div>
    </nav>

 



    <!-- Menu -->
    <div class="container mx-auto my-8 ">

    <h1 class="text-2xl mx-auto  text-center mb-8 ">Welcome, "Username"</h1>

        <div class="flex">
          <!-- search bar -->
            
            <div class="px-20 my-4 p-4 w-full float-left">
              
                <label class="block text-gray-700 font-bold mb-2 " for="search">Search</label>
                <form method="post"><input
                    class="border-2 border-gray-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                    type="search" name="search" id="search">
                   
                    
                <!-- <input type="submit" value="search" class=" p-3 min-w-fit  bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-pink-300 hover:outline-2 rounded-full border-spacing-2
                        font-bold focus:ring-2 hover:translate-0 hover:transition-shadow"> -->
                 <input type="image" src="../images/search.png" alt="Search" class="inline-block align-middle mr-2" height="30" width="30 border-spacing-2 font-bold focus:ring-2 hover:translate-3 hover:transition-shadow">

                        
                </form>
</div>

 <div class="px-20 my-4 p-4  w-full float-left">
                <!-- cart button -->
            
                <a href="invoice.php" class="p-4 min-w-fit float-right bg-pink-700 text-gray-100 hover:text-gray-800
                    hover:bg-pink-300 rounded-md border-spacing-2 font-bold focus:ring-2 hover:translate-0 hover:transition-shadow">
                    <img src="../images/shopping-cart.png" alt="Cart Icon" class="inline-block align-middle mr-2" height="24" width="24">
                    Cart(<span id="cart-count"><?php 
                    $sql = "SELECT count(id)as `total` FROM cart where email='".$_SESSION["email"]."'";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo  $row["total"];
                        }
                    } else {
                        echo "0";
                    }
                    ?></span>)
                </a>

                </div>

        </div>
                </div>


        <!-- menu cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10  rounded-3xl p-16 text-center">
        <?php
    

    $sql = "SELECT * FROM `Food_List`";
    if(isset($_POST["search"])) {
        $search = mysqli_real_escape_string($conn, $_POST["search"]);
        $sql = "SELECT * FROM `Food_List` WHERE Item_Name LIKE '%$search%' OR id ='$search'";
    }
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
?>
            <div class="card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                <img src="<?php echo $row['Image_url'];?>" alt="Menu Item" class="rounded-t-lg mx-auto">
                <div class="p-10">
                    <h2 class="text-xl font-bold mb-2"><?php echo $row['Item_Name']; ?></h2>
                    <p class="text-gray-700"><?php echo $row['Description']; ?></p>
                    <p class="text-pink-500 font-semibold mt-4"><?php echo $row['Price']; ?> BDT</p>
                    <div class="flex items-center mt-4">
                        <button onClick="addtocart('<?php echo $row['id']; ?>')" class="bg-pink-500 text-center mx-auto hover:bg-pink-600 hover:transition duration-200 ease-in-out text-white font-bold py-2 px-4 rounded mt-4">Add to Cart</button>
                    </div>
                </div>
            </div>
<?php
        }
    } else {
        echo "<center>No food Found</center>";
    }
?>
<script>
    function addtocart(id) {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "addtocart.php?foodID="+id);
  xhr.onload = function() {
    if (xhr.status === 200) {
        console.log(xhr.responseText);
        const count = xhr.responseText;
        document.getElementById("cart-count").innerHTML = "000";
        document.getElementById("cart-count").innerHTML = count.toString();
    }
  };
  xhr.send();
}
</script>

                    </div>
              
        </div>
    </div>



    <footer class="bg-pink-600 py-5 px-14">
        <div class="mx-auto">
            <h1 class="text-gray-200 font-bold">Contact Zahirul islam Nahid</h1>
        </div>
    </footer>
    <?php $conn->close();?>
</body>

</html>