<?php
include("protection.php");
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Server Dashboard</title>
    <link rel="stylesheet" href="outputstyles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap"
        rel="stylesheet">
</head>

<body class="bg-pink-100 scroll-smooth font-semibold min-h-screen bg-cover bg-no-repeat"
    style="background-image: url('images/Homepage bg .webp'); backdrop-filter: blur(3px);">

    <!-- Navbar -->
    <?php include('ui/header.php'); ?>
    <!-- Add Item form -->
    <div class="flex items-center justify-center min-h-screen mt-5 pt-4 px-4 my-auto text-center sm:block sm:p-0">
        <h2>Add New Item</h2>
        <form method="get" action="action/handleItem.php?">
            <div>
                <div class="mb-4">
                    <input type="hidden" name="action" id="action" value="add">
                    <label for="itemName" class="block text-black">Item Name:</label>
                    <input type="text" name="itemName" id="itemName"
                        class="border-2 border-pink-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-black">Price:</label>
                    <input type="text" name="price" id="price"
                        class="border-2 border-pink-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-black">Description:</label>
                    <input type="text" name="description" id="description"
                        class="box-content border-2 border-pink-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                </div>
                <div class=" mb-4">
                    <label for="keyword" class="block text-black">Keywords:</label>
                    <input type="text" name="keyword" id="keyword"
                        class="border-2 border-pink-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-black">Image:</label>
                    <input type="text" name="image" id="image"
                        class="border-2 border-pink-400 p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                </div>
                <div class="flex justify-end">
                    <input class="px-5 py-2 mx-2 min-w-fit bg-pink-700 text-gray-100 hover:text-gray-800 hover:bg-gray-50 hover:ring-2 hover:ring-pink-700 rounded-full border-spacing-2 font-raleway focus:ring-2 hover:translate-0 hover:transition-shadow" type="submit" value="Add">
                </div>
        </form>
    </div>

</body>
<?php include('ui/footer.php'); ?>

</html>