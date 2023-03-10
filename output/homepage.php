<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Home </title>
    <link rel="stylesheet" href="outputstyles.css">
</head>

<body class="bg-pink-100 font-semibold min-h-screen bg-cover bg-no-repeat w-full scroll-smooth"
      style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">


  
    <!-- Navbar -->
    <nav class="bg-pink-600 bg-opacity-40 py-4 px-14 z-10">
        <div class="container mx-auto flex font-serif justify-between items-center px-4">
            <a href="homepage.html" class="text-gray-800 text-2xl font-bold">NSU Canteen</a>
           
            <div>
                <a href="login.html" class="bg-pink-700 hover:bg-pink-50 hover:text-black text-white font-bold py-3 px-5 rounded-full focus:outline-black 
                                focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow"
                    >Log Out</a>
            </div>
        </div>
    </nav>

    <!-- Cart -->

    <!-- side cart -->
   
<!-- side cart -->


    <!-- Menu -->
    <div class="container mx-auto my-8 ">
        <div class="flex">
        <!-- <h1 class="text-4xl mx-auto  text-center mb-8 ">Our Menu</h1> -->
        <!-- search bar -->
            <div class="px-20 my-4 p-4 w-full float-left">
                <label class="block text-gray-700 font-bold mb-2 " for="search">Search</label>
                <input
                    class="border-2 border-gray-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                    type="search" name="search" id="search">   
                    <a href="invoice.html"
                        class=" p-5 min-w-fit   float-right bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-pink-100 rounded-full border-spacing-2
                        font-bold focus:ring-2 hover:translate-0 hover:transition-shadow">
                        <img src="../images/shopping-cart.png" alt="Cart Icon" class="inline-block align-middle mr-2" height="24" width="24">
                        Cart(0)
            </a>
            </div>


    </div>

       
       <!-- menu cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10  rounded-3xl p-16 text-center">

            <div
                class="card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 ">
                <img src="../images/Burger.png" alt="Menu Item" class="rounded-t-lg mx-auto">
                <div class="p-10">
                    <h2 class="text-xl font-bold mb-2">Burger</h2>
                    <p class="text-gray-700">A huge single or triple burger with all the fixings, cheese, lettuce,
                        tomato, onions and special sauce or mayonnaise!</p>
                    <p class="text-pink-500 font-semibold mt-4">100 BDT</p>
                    <div class="flex items-center mt-4">

                        <button
                            class="bg-pink-500 text-center mx-auto hover:bg-pink-600 hover:transition duration-200 ease-in-out text-white font-bold py-2 px-4 rounded mt-4">Add
                            to Cart</button>
                    </div>

                </div>
            </div>

            <div
                class="card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105  ">
                <img src="../images/chicken curry.png" alt="Menu Item" class="rounded-t-lg mx-auto">
                <div class="p-10">
                    <h2 class="text-xl font-bold mb-2">Chicken Curry</h2>
                    <p class="text-gray-700">A typical curry from the Indian subcontinent consists of chicken stewed in
                        an onion- and tomato-based sauce</p>
                    <p class="text-pink-500 font-semibold mt-4">70 BDT</p>
                    <div class="flex items-center mt-4">

                        <button
                            class="bg-pink-500 text-center mx-auto hover:bg-pink-600  hover:transition duration-200 ease-in-out text-white font-bold py-2 px-4 rounded mt-4">Add
                            to Cart</button>
                    </div>

                </div>
            </div>

            <div
                class="card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105  ">
                <img src="../images/pizza.jpg" alt="Menu Item" class="rounded-t-lg mx-auto">
                <div class="p-10">
                    <h2 class="text-xl font-bold mb-2">Pizza</h2>
                    <p class="text-gray-700"> consists of a flattened disk of bread dough topped with some combination
                        of olive oil, oregano, tomato, olives, mozzarella</p>
                    <p class="text-pink-500 font-semibold mt-4">90 BDT</p>
                    <div class="flex items-center mt-4">

                        <button
                            class="bg-pink-500 text-center mx-auto hover:bg-pink-600  hover:transition duration-200 ease-in-out text-white font-bold py-2 px-4 rounded mt-4">Add
                            to Cart</button>
                    </div>

                </div>
            </div>

            <div
                class="card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105  ">
                <img src="../images/pasta.png" alt="Menu Item" class="rounded-t-lg mx-auto">
                <div class="p-10">
                    <h2 class="text-xl font-bold mb-2">Pasta</h2>
                    <p class="text-gray-700">This Spicy Chicken Pasta is the perfect level of spice, whilst absolutely
                        bursting with flavour. It’s easy, creamy,
                        hearty and delicious!.</p>
                    <p class="text-pink-500 font-semibold mt-4">80 BDT</p>
                    <div class="flex items-center mt-4">

                        <button
                            class="bg-pink-500 text-center mx-auto hover:bg-pink-600  hover:transition duration-200 ease-in-out text-white font-bold py-2 px-4 rounded mt-4">Add
                            to Cart</button>
                    </div>

                </div>
            </div>

            <div
                class="card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105  ">
                <img src="../images/CHicken biriyani.png" alt="Menu Item" class="rounded-t-lg mx-auto">
                <div class="p-10">
                    <h2 class="text-xl font-bold mb-2">Chicken Biriyani</h2>
                    <p class="text-gray-700">A savory chicken and rice dish that includes layers of chicken, rice, and
                        aromatics that are steamed together.</p>
                    <p class="text-pink-500 font-semibold mt-4">90 BDT</p>
                    <div class="flex items-center mt-4">

                        <button
                            class="bg-pink-500 text-center mx-auto hover:bg-pink-600  hover:transition duration-200 ease-in-out text-white font-bold py-2 px-4 rounded mt-4">Add
                            to Cart</button>
                    </div>

                </div>
            </div>

            <div
                class="card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105  ">
                <img src="../images/kacchi.png" alt="Menu Item" class="rounded-t-lg mx-auto">
                <div class="p-10">
                    <h2 class="text-xl font-bold mb-2">Dhakaiya Kacchi</h2>
                    <p class="text-gray-700">Introducing the spicy and tender dhakaiya kacchi where l,ayers of meat,
                        rice, and potatoes are infused with delicious blends of aromatic spices.</p>
                    <p class="text-pink-500 font-semibold mt-4">110 BDT</p>
                    <div class="flex items-center mt-4">

                        <button
                            class="bg-pink-500 text-center mx-auto hover:bg-pink-600  hover:transition duration-200 ease-in-out text-white font-bold py-2 px-4 rounded mt-4">Add
                            to Cart</button>
                    </div>

                </div>
            </div>

            <div
                class="card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 ">
                <img src="../images/kalabhuna.png" alt=" Beef kalabhuna" class="rounded-t-lg mx-auto">
                <div class="p-10">
                    <h2 class="text-xl font-bold mb-2">Kala Bhuna</h2>
                    <p class="text-gray-700">Authentic and spicy chatgaiya beef kalabhuna. Exclusive dark, flavourful
                        and tender dish prepared with chunks of beef and traditional spices </p>
                    <p class="text-pink-500 font-semibold mt-4">80 BDT</p>
                    <div class="flex items-center mt-4">

                        <button
                            class="bg-pink-500 text-center mx-auto hover:bg-pink-600  hover:transition duration-200 ease-in-out text-white font-bold py-2 px-4 rounded mt-4">Add
                            to Cart</button>
                    </div>

                </div>
            </div>

            <div
                class="card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 ">
                <img src="../images/khichuri.png" alt="Menu Item" class="rounded-t-lg mx-auto">
                <div class="p-10">
                    <h2 class="text-xl font-bold mb-2">Khichuri</h2>
                    <p class="text-gray-700">Authentic bangali khichuri with all the original flavors of Bengal. Made of
                        rice and lentils (dal) with numerous variations</p>
                    <p class="text-pink-500 font-semibold mt-4">40 BDT</p>
                    <div class="flex items-center mt-4">

                        <button
                            class="bg-pink-500 text-center mx-auto hover:bg-pink-600  hover:transition duration-200 ease-in-out text-white font-bold py-2 px-4 rounded mt-4">Add
                            to Cart</button>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <footer class="bg-pink-600 py-5 px-14">
        <div class="mx-auto">
            <h1 class="text-gray-200 font-bold">Contact Zahirul islam Nahid</h1>
        </div>
    </footer>
</body>

</html>