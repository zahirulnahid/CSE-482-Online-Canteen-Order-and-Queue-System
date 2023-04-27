<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Successful</title>
  <!-- Import Tailwind CSS -->
   <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.15/tailwind.min.css"
   integrity="sha512-cPHJ9+o07HHJdL+WqkK1V+gUXsImw1H7ZKsJdPvmG+TQ2Q2K7yLlWJf0KxG2Q6JvZzCtkW8mkXkKjJcB/IO/ew==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<?php 



$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("testcnfvzmb");
$store_passwd=urlencode("cnf6448af550eff9@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;

} else {

	echo "Failed to connect with SSLCOMMERZ";
}
?>

<body class="bg-pink-100 font-semibold min-h-screen bg-cover bg-no-repeat w-full"
    style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">

<!-- navbar -->
<nav class="bg-gray-900 bg-opacity-40 py-4 px-4 sm:px-6 lg:px-14 z-10">
  <div class="container mx-auto flex justify-between items-center">
    <a href="homepage.php" class="text-gray-900 text-2xl border-white font-raleway">NSU Canteen</a>
    <div class="hidden sm:block">
      <a href="login.php" class="bg-pink-700 hover:bg-pink-50 hover:text-black text-white font-raleway py-3 px-5 rounded-full
       focus:outline-black focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow">Log Out</a>
    </div>
    <button class="sm:hidden text-gray-400 hover:text-white focus:outline-black focus:ring-2 focus:ring-pink-400" id="menu-button">
      <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
        <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z" />
      </svg>
    </button>
  </div>
  <div class="sm:hidden" id="menu">
    <a href="login.php" class="flex bg-pink-700 hover:bg-pink-50 hover:text-black text-white font-raleway py-3 px-5 rounded-full
       focus:outline-black focus:ring-2 focus:ring-pink-400 w-fit mx-auto  hover:translate-0 hover:transition-shadow">Log Out</a>
  </div>
</nav>


  <div class="container mx-auto px-20 py-10">
    <div class="bg-white rounded-lg shadow-md p-8">
      <div class="flex items-center justify-center">
        <svg class="w-12 h-12 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M8.002 13.587a.5.5 0 0 0 .71-.005l5.3-5.3a.5.5 0 0 0-.005-.71l-.006-.006a.5.5 0 0 0-.71.005L8.707 11.88 5.47 8.643a.5.5 0 0 0-.71 0l-.006.006a.5.5 0 0 0 0 .71l3.235 3.234a.5.5 0 0 0 .005.005z" clip-rule="evenodd" />
        </svg>
        <h1 class="text-2xl font-bold text-green-500">Payment Successful</h1>
      </div>
      <p class="mt-4 text-gray-600">Thank you for your payment. Your transaction has been successfully processed.</p>
       <p class="mt-4 text-gray-600"><?php  echo $status." ".$tran_date." ".$tran_id." ".$card_type;
 ?></p>
      <div class="mt-6 flex justify-end">
        <a href="./homepage.php" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded-full">Continue Shopping</a>
      </div>
    </div>
  </div>
</body>
</html>
