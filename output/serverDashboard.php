<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Server Dashboard</title>
    <link rel="stylesheet" href="outputstyles.css">


<body class="bg-pink-100 scroll-smooth font-semibold min-h-screen bg-cover bg-no-repeat w-full"
    style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">

    <!-- Navbar -->
    <nav class="bg-pink-700 bg-opacity-40 py-4 px-14">
        <div class="container mx-auto flex font-serif justify-between items-center px-4">
            <a href="#" class="text-gray-800 text-2xl font-bold">NSU Canteen Server</a>
          
            <div>
            <button class="bg-pink-700 hover:bg-pink-50 hover:text-black text-white font-bold py-3 px-5 rounded-full focus:outline-black 
                                            focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow"
                type="submit">Log Out</button>
            </div>
            </div>
        
    </nav>

    <div class="flex m-14">
        <!-- <h1 class="text-4xl mx-auto  text-center mb-8 ">Our Menu</h1> -->
        <!-- search bar -->
        <div class="px-20 my-4 p-4 w-full float-left">
            <label class="block text-gray-700 font-bold mb-2 " for="search">Search</label>
            <input
                class="border-2 border-gray-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                type="search" name="search" id="search">
        </div>
    
    
    </div>

    <!-- menu list view -->
    <ul class="grid grid-cols-1 gap-4 mx-auto my-28 container shadow-none">
        <li class="bg-pink-50 rounded-xl shadow-lg mb-4 overflow-hidden flex">
            <img src="../images/Burger.png" alt="Product" class="w-24 h-24 rounded-2xl m-5 object-cover flex-shrink-0">
            <div class="p-5 flex-grow">
                <h3 class="text-base font-bold text-gray-900 mb-1">2 x Burger</h3>
                <h3 class="text-base font-bold text-gray-900 mb-1">2011068</h3>
                <h3 class="text-base font-bold text-gray-900 mb-1">Queue No: 71</h3>
                <button class=" p-5 min-w-fit   float-right bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-pink-100 rounded-full border-spacing-2
                            font-bold focus:ring-2 hover:translate-0 hover:transition-shadow">Served</button>
                <p class="text-gray-700 font-medium">Dequeue</p>
            </div>
        </li>
        <li class="bg-pink-50 rounded-xl shadow-lg mb-4 overflow-hidden flex">
            <img src="../images/CHicken biriyani.png" alt="Product"
                class="w-24 h-24 rounded-2xl m-5 object-cover flex-shrink-0">
            <div class="p-5 flex-grow">
                <h3 class="text-base font-bold text-gray-900 mb-1">1 x Chicken Biriyani</h3>
                <h3 class="text-base font-bold text-gray-900 mb-1">2016548</h3>
                <h3 class="text-base font-bold text-gray-900 mb-1">Queue No: 72</h3>
                                <button class=" p-5 min-w-fit   float-right bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-pink-100 rounded-full border-spacing-2
                            font-bold focus:ring-2 hover:translate-0 hover:transition-shadow">Served</button>
                <p class="text-gray-700 font-medium">Dequeue</p>
            </div>
        </li>
        <li class="bg-pink-50 rounded-xl shadow-lg mb-4 overflow-hidden flex">
            <img src="../images/chicken curry.png" alt="Product"
                class="w-24 h-24 rounded-2xl m-5 object-cover flex-shrink-0">
            <div class="p-5 flex-grow">
                <h3 class="text-base font-bold text-gray-900 mb-1">1 x Chicken Curry</h3>
                <h3 class="text-base font-bold text-gray-900 mb-1">2015418</h3>
                <h3 class="text-base font-bold text-gray-900 mb-1">Queue No: 73</h3>
                                <button class=" p-5 min-w-fit   float-right bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-pink-100 rounded-full border-spacing-2
                            font-bold focus:ring-2 hover:translate-0 hover:transition-shadow">Served</button>
                <p class="text-gray-700 font-medium">Dequeue</p>
            </div>
        </li>
        <li class="bg-pink-50 rounded-xl shadow-lg mb-4 overflow-hidden flex">
            <img src="../images/daal.png" alt="Product" class="w-24 h-24 rounded-2xl m-5 object-cover flex-shrink-0">
            <div class="p-5 flex-grow">
                <h3 class="text-base font-bold text-gray-900 mb-1">1 x Daal</h3>
                <h3 class="text-base font-bold text-gray-900 mb-1">2013421</h3>
                <h3 class="text-base font-bold text-gray-900 mb-1">Queue No: 74</h3>
                                <button class=" p-5 min-w-fit   float-right bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-pink-100 rounded-full border-spacing-2
                            font-bold focus:ring-2 hover:translate-0 hover:transition-shadow">Served</button>
                <p class="text-gray-700 font-medium">Dequeue</p>
            </div>
        </li>
      

    </ul>
</body>
</head>
</html>