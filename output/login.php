<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Login</title>
    <link rel="stylesheet" href="outputstyles.css">
</head>

<body>
  <div class="flex flex-col md:flex-row">
    <div class="w-full md:w-2/3 min-h-screen bg-cover bg-center" style="background-image: url('../images/loginPageBg.png');"></div>

    <div class="w-full md:w-1/3 min-h-screen bg-gradient-to-t from-gray-200 to-gray-50 md:bg-transparent md:p-0">
      <div class="flex flex-col justify-center items-center h-full">
        <div class="bg-white p-6 rounded-lg shadow-2xl w-full md:w-96 sm:px-10 ">
          <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">NSU cafeteria</h2>
          <form action="homepage.html" method="post">
            <div class="mb-4">
              <label class="block text-gray-700 font-bold mb-2" for="username">Username</label>
              <input class="border-2 border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400" type="text" name="username" id="username" required>
            </div>
            <div class="mb-6">
              <label class="block text-gray-700 font-bold mb-2" for="password">Password</label>
              <input class="border-2 border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400" type="password" name="password" id="password" required>
            </div>
            <button class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded focus:outline-none 
            focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow" type="submit">Login</button>
          </form>
          <a href="#" class="text-pink-500 font-bold hover:text-pink-700 block mt-4 hover:translate-x-1">Forgot Password</a>
          <p class="text-gray-800 mt-4 text-center">Don't have an account?
            <a href="signUp.html" class="text-pink-500 font-bold hover:text-pink-700 hover:translate-x-1">Sign up here.</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</body>




</html>