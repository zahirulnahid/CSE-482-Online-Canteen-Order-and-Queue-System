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

  <div class="container mx-auto px-20 py-10">
    <div class="bg-white rounded-lg shadow-md p-8">
      <div class="flex items-center justify-center">
        <svg class="w-12 h-12 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M8.002 13.587a.5.5 0 0 0 .71-.005l5.3-5.3a.5.5 0 0 0-.005-.71l-.006-.006a.5.5 0 0 0-.71.005L8.707 11.88 5.47 8.643a.5.5 0 0 0-.71 0l-.006.006a.5.5 0 0 0 0 .71l3.235 3.234a.5.5 0 0 0 .005.005z" clip-rule="evenodd" />
        </svg>
        <h1 class="text-2xl font-bold text-green-500">Payment Successful</h1>
      </div>
      <p class="mt-4 text-gray-600">Thank you for your payment. Your transaction has been successfully processed.</p>
      <div class="mt-6 flex justify-end">
        <a href="./homepage.php" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded-full">Continue Shopping</a>
      </div>
    </div>
  </div>
</body>
</html>
