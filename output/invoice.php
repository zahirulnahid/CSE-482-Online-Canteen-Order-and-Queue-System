<?php
include("protection.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
  <title>Invoice</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.15/tailwind.min.css"
    integrity="sha512-cPHJ9+o07HHJdL+WqkK1V+gUXsImw1H7ZKsJdPvmG+TQ2Q2K7yLlWJf0KxG2Q6JvZzCtkW8mkXkKjJcB/IO/ew=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="outputstyles.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap"
    rel="stylesheet">


</head>

<body class="bg-pink-100 font-semibold min-h-screen bg-cover bg-no-repeat w-full"
  style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">


  <!-- PHP for PAYMENT GATEWAY -->
  <?php



  error_reporting(0);
  date_default_timezone_set('Asia/Dhaka');
  //Generate Unique Transaction ID
  function rand_string($length)
  {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    $size = strlen($chars);
    for ($i = 0; $i < $length; $i++) {
      $str .= $chars[rand(0, $size - 1)];
    }

    return $str;
  }
  $cur_random_value = rand_string(6);

  ?>

<!-- NAVBAR -->
<?php include('ui/header.php'); ?>



  <div class="bg-gray-300 shadow-xl rounded-lg bg-opacity-50 py-4 mx-auto my-8 px-4 sm:px-6 lg:px-8 w-full lg:w-1/2">

    <div class="flex flex-col ">
      <div class="text-2xl text-gray-900 font-raleway mb-4">Cart</div>
      <ul class="flex-1 overflow-y-auto">
        <!-- Add items dynamically using JavaScript -->
        <?php
        $sql = "SELECT cart.*, food_list.Item_Name, food_list.Price
              FROM cart INNER JOIN food_list ON cart.foodID = food_list.id WHERE email='" . $_SESSION["email"] . "';";

        $total = 0;

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
            $total += $row["Price"] * $row["quantity"];
            ?>
            <li class="flex justify-between items-center py-2 px-4 border-b border-gray-500">
              <span class="text-gray-800 font-raleway">
                <?php echo $row["Item_Name"]; ?>
              </span>
              <span class="text-pink-700 font-raleway">
                <?php echo $row["Price"]; ?> BDT
              </span>
              <div class="flex item mt-0.5">
                <button onclick="updateCart('<?php echo $row['foodID']; ?>', 'remove')"
                  class="bg-pink-700 hover:bg-pink-50 hover:text-black
              text-white font-raleway max-w-fit mr-1 py-1 px-2 rounded-full focus:outline-black  hover:ring-pink-400 hover:ring-2 w-8 hover:translate-0 
              hover:transition-shadow mt-4">-</button>

                <span id="quantity-<?php echo $row['foodID']; ?>" class="text-pink-700 font-bold text-center w-6"><?php echo $row["quantity"]; ?> </span>

                <button onclick="updateCart('<?php echo $row['foodID']; ?>', 'add')"
                  class="bg-pink-700 hover:bg-pink-50 hover:text-black text-white font-raleway max-w-fit ml-1 py-1 px-2 rounded-full focus:outline-black 
                  focus:ring-2 hover:ring-pink-400 hover:ring-2 w-8 hover:translate-0 hover:transition-shadow mt-4">+</button>
              </div>
            </li>
            <?PHP
          }
        }
        ?>
      </ul>
      <script>
        function updateCart(id, scope) {
          const xhr = new XMLHttpRequest();
          xhr.open("GET", "updatecart.php?foodID=" + id + "&scope=" + scope, true);
          console.log("ID: " + id + " scope: " + scope + "\n");
          xhr.onload = function () {
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
      <script>
        function updateCart(id, scope) {
          const xhr = new XMLHttpRequest();
          xhr.open("GET", "action/updatecart.php?foodID=" + id + "&scope=" + scope, true);
          console.log("ID: " + id + " scope: " + scope + "\n");
          xhr.onload = function () {
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
        <span class="text-pink-700 font-raleway text-xl">
          <?php echo $total; ?> BDT
        </span>
      </div>
      <div class="flex flex-col md:flex-row justify-center items-center mx-auto m-5">


        
        <a href="../output/homepage.php"
          class="bg-gray-100 hover:bg-pink-700 hover:text-white text-black font-raleway py-3 px-5 m-4 rounded-full ring-pink-600 ring-2
           hover:ring-2 hover:ring-pink-100 max-w-fit hover:translate-0 hover:transition-shadow md:mx-2">
          Back to menu
        </a>
    
         <!-- ******************* Payment gateway code *********************-->
                      
<?php
require('config.php');
$paymentTotal=$total*100;
?>
        <form action="success.php" method="POST" class="stripe-btn">
          <input type="hidden" name="amount" value="<?php echo $paymentTotal?>">
          <script src="https://checkout.stripe.com/checkout.js" class="stripe-button bg-pink-700 hover:bg-gray-100 hover:text-black text-white font-raleway py-3 px-5 m-4 rounded-full
                        ring-white ring-2  hover:ring-2 hover:ring-pink-600 max-w-sm hover:translate-0 hover:transition-shadow md:mx-2"
                        data-key="pk_test_51N6wRoCTMtJu4CIwVY9pADeVsg3dgPlOnE669GWeuMskwfvrsOtfeeGjlgCgbrCpvqL1Ya0n9tEJhDn3KXjNpYQr00QAZNLran"
                        data-amount="<?php echo $paymentTotal?>"
                        data-name="NSU Canteen"
                        data-description="NSU canteen payment"
                        data-image=""
                        data-currency="bdt"
                        >

          </script>

          <!-- make this button functional so that it goes with the overall style -->
          <input type="submit" class="stripe-button bg-pink-700 hover:bg-gray-100 hover:text-black text-white font-raleway py-3 px-5 m-4 rounded-full
                        ring-white ring-2  hover:ring-2 hover:ring-pink-600 max-w-sm hover:translate-0 hover:transition-shadow md:mx-2" value="Proceed to payment">

       
        </form>
            
              
          
        
        </center>


        <!-- <a  class="bg-pink-700 hover:bg-gray-100 hover:text-black text-white font-raleway py-3 px-5 m-4 rounded-full focus:outline-4 focus:outline-pink-700 focus:ring-2 focus:ring-pink-400 max-w-sm hover:translate-0 hover:transition-shadow md:mx-2">
      Proceed to Payment
    </a> -->
      </div>






    </div>
  </div>

  <?php include ('ui/footer.php');?>

</body>
<?php $conn->close(); ?>

</html>