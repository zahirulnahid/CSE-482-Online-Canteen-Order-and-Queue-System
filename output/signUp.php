<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Sign Up</title>
    <link rel="stylesheet" href="outputstyles.css">
</head>
<body>
    <div class="flex flex-col md:flex-row">
        <div class="w-full md:w-2/3 min-h-screen bg-cover bg-center"
            style="background-image: url('../images/loginPageBg.png');">
        </div>

        <div class="w-full md:w-1/3 min-h-screen bg-gradient-to-t from-gray-200 to-gray-50"
            style="background-image: url('../images/loginFormBg.png'); background-size: cover;">
            <div class="flex flex-col justify-center items-center h-full">
                <div class="bg-white p-6 rounded-lg shadow-2xl w-96">
                    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Register</h2>
                    <form>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="actor">
                               Create Account As
                            </label>
                            <input type="radio" id="html" name="fav_language" value="HTML">
                            <label for="html">Student</label>
                            <input type="radio" id="css" name="fav_language" value="CSS">
                            <label for="css">Faculty</label>
                            <input type="radio" id="javascript" name="fav_language" value="JavaScript">
                            <label for="javascript">Staff</label>
                        </div>                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="name">
                                Name
                            </label>
                            <input
                                class="border-2 border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                                type="text" name="name" id="name" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="email">
                                Email
                            </label>
                            <input
                                class="border-2 border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                                type="email" name="email" id="email" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="password">
                                Password
                            </label>
                            <input
                                class="border-2 border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                                type="password" name="password" id="password" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="confirm-password">
                                Confirm Password
                            </label>
                            <input
                                class="border-2 border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                                type="password" name="confirm-password" id="confirm-password" required>
                        </div>

                        <button
                            class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-pink-400"
                            type="submit">
                            Register
                        </button>
                    </form>
                    <p class="text-gray-800 mt-4">Already have an account?
                        <a href="login.html" class="text-pink-500 font-bold hover:text-pink-700">Log in here.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>




</html>