<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Sign Up</title>
    <link rel="stylesheet" href="outputstyles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap"
    rel="stylesheet">
</head>



<?php include("connection.php"); //Created connection with DB//
if (isset($_POST["email"])) {
    // Get form data
    $category = $_POST['category'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = md5($password);

    // Insert data into the "users" table
    $sql = "INSERT INTO users (`category`, `name`, `email`, `phone`, `password`) 
            VALUES ('$category', '$name', '$email', '$phone', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        $success_message = "New record created successfully";
    } else {
        $error_message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
$conn->close();
?>
<!-- Registration form HTML code goes here -->

<!-- Bootstrap Modal for success message -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Account Created successfully</h4>
            </div>
            <div class="modal-body">
                <!-- <p>Just wait for verification.</p> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal for error message -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Error</h4>
            </div>
            <div class="modal-body">
                <p>
                    <?php echo isset($error_message) ? $error_message : ''; ?>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function () {
        <?php if (isset($success_message)): ?>
            $('#successModal').modal('show');
        <?php elseif (isset($error_message)): ?>
            $('#errorModal').modal('show');
        <?php endif; ?>

    });

    function validateForm() {
        // PASSWORD LENGTH MUST BE BETWEEN 8-32 CHARACTERS
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

        //EMAIL VALIDATION
        var email = document.forms["myForm"]["email"].value;
        var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (!email.match(mailformat)) {
            document.getElementById("emailError").innerHTML =
                "Please enter a valid Email";
            return false;
        }

        //PHONE NUMBER SHOULD BE NUMERIC CHARS ONLY 
        var numbers = /^[0-9]+$/;
        var numLen = document.forms["myForm"]["phone"].value.length;

        if (!document.forms["myForm"]["phone"].value.match(numbers) || numLen != 11) {
            document.getElementById("numberError").innerHTML =
                "Please enter a valid number";
            return false;
        }
    }
</script>



<body>
    <div class="flex flex-col md:flex-row">
        <div class="w-full md:w-2/3 min-h-screen bg-cover bg-center"
            style="background-image: url('../images/loginPageBg.png');">
        </div>

        <div class="w-full md:w-1/3 min-h-screen bg-gradient-to-t from-gray-200 to-gray-50"
            style="background-image: url('../images/loginFormBg.png'); background-size: cover;">
            <div class="flex flex-col justify-center items-center h-full">
                <div class="bg-white p-6 rounded-lg shadow-2xl w-96">
                    <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">NSU Canteen Register</h2>

                    <!-- FORM STARTS -->
                    <form name="myForm" method="POST" onsubmit="return validateForm()">


                        <!-- TYPE OF ACCOUNT -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-raleway mb-2" for="actor">
                                Create Account As
                            </label>
                            <input type="radio" id="Student" name="category" value="1" required>
                            <label for="Student">Student</label>
                            <input type="radio" id="Faculty" name="category" value="2" required>
                            <label for="Faculty">Faculty</label>
                            <input type="radio" id="Staff" name="category" value="3" required>
                            <label for="Staff">Staff</label>
                        </div>

                        <!-- NAME OF ACCOUNT -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-raleway mb-2" for="name">
                                Name
                            </label>
                            <input
                                class="border-2 border-gray-400 p-2 w-full rounded-full focus:outline-none focus:ring-2 focus:ring-pink-400"
                                type="text" name="name" id="name" placeholder="Enter name" required>
                        </div>

                        <!-- EMAIL -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-raleway mb-2" for="email">
                                Email
                            </label>
                            <input
                                class="border-2 border-gray-400 p-2 w-full rounded-full focus:outline-none focus:ring-2 focus:ring-pink-400"
                                type="email" name="email" id="email" placeholder="Enter valid email" required>
                            <!-- email error -->
                            <p id="emailError" class="text-pink-500 font-raleway "></p>
                        </div>

                        <!-- PHONE NUMBER -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-raleway mb-2" for="phone">
                                Phone Number
                            </label>
                            <!--   NUMBER ERROR -->
                            <p id="numberError" class="text-pink-500 font-raleway "></p>
                            <input
                                class="border-2 border-gray-400 p-2 w-full rounded-full focus:outline-none focus:ring-2 focus:ring-pink-400"
                                type="text" name="phone" id="phone" placeholder="11-digit Phone number" required>
                        </div>

                        <!--PASSWORD -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-raleway mb-2" for="password">
                                Password
                            </label>

                            <!-- PASSWORD ERROR -->
                            <p id="passwordError" class="text-pink-500 font-raleway "></p>

                            <input
                                class="border-2 border-gray-400 p-2 w-full rounded-full focus:outline-none focus:ring-2 focus:ring-pink-400"
                                type="password" name="password" id="password" placeholder="8-32 charcter password"
                                required>
                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-raleway mb-2" for="confirmPassword">
                                Confirm Password
                            </label>
                            <!-- CONFIRM PASSWORD ERROR -->
                            <p id="confirmPasswordError" class="text-pink-500 font-raleway "></p>
                            <input
                                class="border-2 border-gray-400 p-2 w-full rounded-full focus:outline-none focus:ring-2 focus:ring-pink-400"
                                type="password" name="confirmPassword" id="confirmPassword"
                                placeholder="Re-enter Password" required>
                        </div>

                        <!-- REGISTER BUTTON -->
                        <input type="submit" value="Register"
                            class="bg-pink-700 hover:bg-pink-100 hover:text-gray-900 hover:ring-2 hover:ring-pink-700 text-white font-raleway  py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-pink-400">

                    </form>

                    <!-- FORM ENDS -->
                    <p class="text-gray-800 mt-4">Already have an account?
                        <a href="login.php" class="text-pink-500 font-bold hover:text-pink-700">Log in here.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php include ('ui/footer.php');?>

</body>




</html>