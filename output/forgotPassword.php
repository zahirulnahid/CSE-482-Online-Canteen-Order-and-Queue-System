<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
  <title>password reset</title>
  <link rel="stylesheet" href="outputstyles.css">
  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap"
    rel="stylesheet">
</head>



<body>
  <div class="flex flex-col md:flex-row">
    <div class="w-full md:w-2/3 min-h-screen bg-cover bg-center"
      style="background-image: url('../images/loginPageBg.png');"></div>

    <div class="w-full md:w-1/3 min-h-screen bg-gradient-to-t from-gray-200 to-gray-50 md:bg-transparent md:p-0">
      <div class="flex flex-col justify-center items-center h-full">
        <div class="bg-white p-6 rounded-lg shadow-2xl w-full md:w-96 sm:px-10 ">
          <h2 class="text-2xl font-raleway mb-6 text-center text-gray-800">NSU cafeteria</h2>

          <!-- LOGIN FORM STARTS  -->
          <form name="myForm" method="GET" onsubmit="return validateForm()" action="authentication.php">
            <div class="mb-4">
              <label class="block text-gray-700 font-raleway mb-2" for="email">Email</label>
              <input
                class="border-2 border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                type="text" name="email" id="email" required>
              <!-- error message if email is not valid -->
              <p id="emailError" class="text-pink-500 font-raleway"></p>
            </div>
            <div class="mb-6">
              <label class="block text-gray-700 font-raleway mb-2" for="password">Password</label>
              <input
                class="border-2 border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                type="password" name="password" id="password" required>
              <!-- error message is password is not valid -->
              <p id="passwordError" class="text-pink-500 font-raleway "></p>
            </div>
            <!-- CONFIRM PASSWORD -->
            <div class="mb-4">
              <label class="block text-gray-700 font-raleway mb-2" for="confirmPassword">
                Confirm Password
              </label>

              <input
                class="border-2 border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                type="password" name="confirmPassword" id="confirmPassword" placeholder="Re-enter Password" required>
              <!-- CONFIRM PASSWORD ERROR -->
              <p id="confirmPasswordError" class="text-pink-500 font-raleway "></p>
            </div>

            <!-- log in button -->
            <input type="submit" value="Reset Password" class="bg-pink-500 hover:bg-pink-700 text-white font-raleway py-2 px-4 rounded focus:outline-none 
            focus:ring-2 focus:ring-pink-400 w-full hover:translate-0 hover:transition-shadow">
          </form>
          <!--LOGIN FORM ENDS  -->



          </p>
        </div>
      </div>
    </div>
  </div>


  <!-- java script -->
  <script>

    function validateForm() {

      // Email field
      var email = document.forms["myForm"]["email"].value;
      var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
      // var error= document.getElementById("error").innerHTML;

      if (!email.match(mailformat)) {
        document.getElementById("emailError").innerHTML =
          "Please enter a valid Email";
        return false;
      }


      // password field

      let x = document.forms["myForm"]["password"].value.length;
      var password = document.getElementById('password').value;

      if (!(password.length <= 32 && password.length >= 8)) {

        document.getElementById("passwordError").innerHTML =
          "Password length must between 8-32 characters";
        return false;

      }

      // password confirm
      if ((document.forms["myForm"]["password"].value != document.forms["myForm"]["confirmPassword"].value)) {
        document.getElementById("confirmPasswordError").innerHTML =
          "Password not matched";
        return false;
      }

    }




  </script>

<footer class="bg-pink-600 text-white px-4 py-6">
  <div class="max-w-7xl mx-auto">
    <div class="flex flex-wrap justify-between">
      <div class="w-full md:w-1/3 lg:w-1/4 mb-6">
        <h3 class="text-lg font-medium mb-2">🚹 About Us:</h3>
        <p class="text-sm">📝 For the purpose of the CSE 482 & CSE 482 <br> Lab project, this website was developed <br> by us. <br><br> Thank you! 🤍</p>
      </div>
      <div class="w-full md:w-1/3 lg:w-1/4 mb-6">
        <h3 class="text-lg font-medium mb-2">🧑🏻‍💻 Our Services:</h3>
        <ul class="text-sm">
          <li><a href="#">✅ Universal Canteen Meal Ordering Portal</a></li>
          <li><a href="#">✅ Automate Canteen Meal Ordering</a></li>
          <li><a href="#">✅ Introduce Digital Payment</a></li>
          <li><a href="#">✅ Queue System to Save Time</a></li>
        </ul>
      </div>
      <div class="w-full md:w-1/3 lg:w-1/4 mb-6">
        <h3 class="text-lg font-medium mb-2">📩 Contact Us:</h3>
        <p class="text-sm">🌎 Bashundhara R\A; Dhaka, Bangladesh<br>📠 +880-2-55668200<br>📧 Mail Address - 482@nsu.com <br>🕐 Office Hours: Varsity Time </p>
      </div>
      <div class="w-full md:w-1/3 lg:w-1/4 mb-6">
        <h3 class="text-lg font-medium mb-2">🌐 Location:</h3>
        <div class="flex">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.098092052636!2d90.42298167501689!3d23.81511067862635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c64c103a8093%3A0xd660a4f50365294a!2sNorth%20South%20University!5e0!3m2!1sen!2sbd!4v1683553954593!5m2!1sen!2sbd" width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-6 border-t border-gray-700 pt-4 flex justify-between items-center">
    <p class="text-sm">&copy; 2023 CSE™️   All Rights Reserved ✔️</p>
    <ul class="flex text-sm">
      <li class="mr-4"><a href="#">📑 Terms of Service</a></li>
      <li class="mr-4"><a href="#">🔏 Privacy Policy</a></li>
    </ul>
  </div>
</footer>

</body>




</html>