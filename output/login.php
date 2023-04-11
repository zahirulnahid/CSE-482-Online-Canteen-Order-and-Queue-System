<?php session_start();
if(isset($_SESSION["errorMessage"]))$errorMessage=$_SESSION["errorMessage"];else $errorMessage="";
session_destroy();
setcookie("user", "", time() - 3600);unset($_COOKIE['user']);?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Login</title>
    <link rel="stylesheet" href="outputstyles.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="flex flex-col md:flex-row">
    <div class="w-full md:w-2/3 min-h-screen bg-cover bg-center" style="background-image: url('../images/loginPageBg.png');"></div>

    <div class="w-full md:w-1/3 min-h-screen bg-gradient-to-t from-gray-200 to-gray-50 md:bg-transparent md:p-0">
      <div class="flex flex-col justify-center items-center h-full">
        <div class="bg-white p-6 rounded-lg shadow-2xl w-full md:w-96 sm:px-10 ">
          <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">NSU cafeteria</h2>
          
      <!-- LOGIN FORM STARTS  -->
        <form name="myForm" method="POST" onsubmit="return validateForm()" action="authentication.php">
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
            <input class="border-2 border-gray-400 p-2 w-full rounded-full focus:outline-none focus:ring-2 focus:ring-pink-400"
              type="text" name="email" id="email" required>

            <!-- error message if email is not valid -->

            <p id="emailError" class="text-pink-500 font-bold"></p>
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="password">Password</label>
            <input class="border-2 border-gray-400 p-2 w-full rounded-full focus:outline-none focus:ring-2 focus:ring-pink-400"
              type="password" name="password" id="password" required>

            <!-- error message is password is not valid -->

            <p id="passwordError" class="text-pink-500 font-bold "></p>
          </div>

          <p id="passwordError" class="text-pink-500 font-extrabold "><?=$errorMessage;?></p>
          <!-- "Remember me" checkbox -->

          <div class="mb-4 flex items-center">
            <input class="form-checkbox w-4 h-4  border-gray-400 text-pink-500 focus:outline-none focus:ring-2 focus:ring-pink-400"
              type="checkbox" name="remember_me" id="remember_me">
            <label class="ml-2 text-gray-700 font-bold" for="remember_me">Remember me</label>
          </div>

          <!-- log in button -->

          <input type="submit" value="Login" class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none 
                    focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow">
        </form>

      <!--LOGIN FORM ENDS  -->


          <a href="./forgotPassword.php" class="text-pink-500 font-bold hover:text-pink-700 block mt-4 hover:translate-x-0">Forgot Password</a>
          <p class="text-gray-800 mt-4 text-center">Don't have an account?
            <a href="signUp.php" class="text-pink-500 font-bold hover:text-pink-700 hover:translate-x-0">Sign up here.</a>
          </p>
        </div>
      </div>
    </div>
  </div>


                                                <!-- java script -->
  <script>

    function validateForm(){   

      // Email field
        var email = document.forms["myForm"]["email"].value;
      var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
      // var error= document.getElementById("error").innerHTML;
      
      if (!email.match(mailformat)) {
       document.getElementById("emailError").innerHTML=  
      "Please enter a valid Email";  
      return false;  
      }

      // password field

      let x = document.forms["myForm"]["password"].value.length;
      var password = document.getElementById('password').value;

      if (!(password.length <= 32 && password.length >= 8)) {

         document.getElementById("passwordError").innerHTML=  
      "Password length must between 8-32 characters";
      return false;  
        
      }
    }
    
    

    
  </script>
</body>





</html>