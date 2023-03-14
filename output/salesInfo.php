<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Sales Info</title>
    <link rel="stylesheet" href="outputstyles.css">


<body class="bg-pink-100 scroll-smooth font-semibold min-h-screen bg-cover bg-no-repeat w-full"
    style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">

    <!-- Navbar -->
    <nav class="bg-pink-700 bg-opacity-40 py-4 px-14">
        <div class="container mx-auto flex font-serif justify-between items-center px-4">
            <a href="#" class="text-gray-800 text-2xl font-bold">NSU Canteen</a>
          
            <div>
            <button class="bg-pink-700 hover:bg-pink-50 hover:text-black text-white font-bold py-3 px-5 rounded-full focus:outline-black 
                                            focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow"
                type="submit">Log Out</button>
            </div>
            </div>
        
    </nav>

    <div class="flex m-14">

    
    
    </div>

    <!-- menu list view -->
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Sales Report</h1>
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Product Name</th>
                    <th class="px-4 py-2">Units Sold</th>
                    <th class="px-4 py-2">Price per Unit</th>
                    <th class="px-4 py-2">Total Revenue</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white">
                    <td class="px-4 py-2">Product A</td>
                    <td class="px-4 py-2">100</td>
                    <td class="px-4 py-2">$10</td>
                    <td class="px-4 py-2">$1000</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="px-4 py-2">Product B</td>
                    <td class="px-4 py-2">50</td>
                    <td class="px-4 py-2">$20</td>
                    <td class="px-4 py-2">$1000</td>
                </tr>
                <tr class="bg-white">
                    <td class="px-4 py-2">Product C</td>
                    <td class="px-4 py-2">75</td>
                    <td class="px-4 py-2">$15</td>
                    <td class="px-4 py-2">$1125</td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="bg-gray-200">
                    <td class="px-4 py-2 font-bold">Total</td>
                    <td class="px-4 py-2 font-bold"></td>
                    <td class="px-4 py-2 font-bold"></td>
                    <td class="px-4 py-2 font-bold">$3125</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</head>
</html>