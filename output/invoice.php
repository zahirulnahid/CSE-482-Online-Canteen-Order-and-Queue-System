<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Invoice</title>
    <link rel="stylesheet" href="outputstyles.css">
</head>

<body class="bg-pink-100 font-semibold min-h-screen bg-cover bg-no-repeat w-full"
    style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">



    <!-- Navbar -->
    <nav class="bg-pink-600 bg-opacity-40 py-4 px-14 z-10">
        <div class="container mx-auto flex font-serif justify-between items-center px-4">
            <a href="homepage.php" class="text-gray-800 text-2xl font-bold">NSU Canteen</a>
           
            <div>
                <a href="login.php" class="bg-pink-700 hover:bg-pink-50 hover:text-black text-white font-bold py-3 px-5 rounded-full focus:outline-black 
                                focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow"
                    >Log Out</a>
            </div>
        </div>
    </nav>

    <div class="bg-gray-200 shadow-lg rounded-lg bg-opacity-40 py-4 mx-auto my-28 px-14 h-full w-1/2">
        <div class="flex flex-col ">
            <div class="text-2xl text-gray-900 font-bold mb-4">Cart</div>
            <ul class="flex-1 overflow-y-auto">
                <!-- Add items dynamically using JavaScript -->
                <li class="flex justify-between items-center py-2 px-4 border-b border-gray-500">
                    <span class="text-gray-800 font-medium">Item 1</span>
                    <span class="text-pink-500 font-medium">$10</span>
                </li>
                <li class="flex justify-between items-center py-2 px-4 border-b border-gray-500">
                    <span class="text-gray-800 font-medium">Item 2</span>
                    <span class="text-pink-500 font-medium">$20</span>
                </li>
                <li class="flex justify-between items-center py-2 px-4 border-b border-gray-500">
                    <span class="text-gray-800 font-medium">Item 3</span>
                    <span class="text-pink-500 font-medium">$30</span>
                </li>
            </ul>
            <div class="py-4 px-6 flex justify-between items-center">
                <span class="text-gray-800 font-bold text-xl">Total:</span>
                <span class="text-pink-500 font-bold text-xl">$60</span>
            </div>

            <button class="bg-pink-700 hover:bg-pink-300 hover:text-black text-white font-bold mx-auto py-3 px-5 rounded-full focus:outline-black 
                                            focus:ring-2 focus:ring-pink-400 max-w-fit  hover:translate-0 hover:transition-shadow"
                type="submit">Proceed to Payment</button>
        </div>
    </div>


</body>
</html>