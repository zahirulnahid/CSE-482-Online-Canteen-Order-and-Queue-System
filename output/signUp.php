<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Sign Up</title>
    <link rel="stylesheet" href="outputstyles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 

</head>
<?php include("connection.php");//Created connection with DB
if(isset($_POST["email"])){
    // Get form data
    $category = $_POST['category'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

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
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Registration Successful</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><?php echo isset($success_message) ? $success_message : ''; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal for error message -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Registration Failed</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><?php echo isset($error_message) ? $error_message : ''; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Register</h2>
                    <form method="POST">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="actor">
                               Create Account As
                            </label>
                            <input type="radio" id="Student" name="category" value="1">
                            <label for="Student">Student</label>
                            <input type="radio" id="Faculty" name="category" value="2">
                            <label for="Faculty">Faculty</label>
                            <input type="radio" id="Staff" name="category" value="3">
                            <label for="Staff">Staff</label>
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
                            <label class="block text-gray-700 font-bold mb-2" for="email">
                                Phone Number
                            </label>
                            <input
                                class="border-2 border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                                type="text" name="phone" id="phone" required>
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
                        <a href="login.php" class="text-pink-500 font-bold hover:text-pink-700">Log in here.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>




</body>




</html>