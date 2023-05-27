<!DOCTYPE html>
<?php
include('protection.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Send Notification</title>
    <link rel="stylesheet" href="outputstyles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap"
    rel="stylesheet">
   <!-- <style type="text/css">
   	.notifycard {
	    width: 60%;
	    margin: 0 auto;
	    margin-top: 40px !important;
	    margin-bottom: 40px !important;
   	}
   	.form-title {
	    margin: 0 auto;
	    display: table;
	    font-size: 28px;
	    margin-bottom: 20px;
   	}
   	.select2-selection__rendered{
   		float: left;
   		margin: -3px;
   	}
   	label {
	    float: left;
	    color: #be185d;
	    font-size: 19px;
	    font-weight: 600;
	    margin-bottom: 20px;
	}
   </style> -->
</head>
<?php
// include("connection.php"); //Created connection with DB//

// print_r($_SESSION);
// exit;

$sql = "SELECT id,name FROM users WHERE category != 4";
$userresult = mysqli_query($conn, $sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Get form data
	$senderid = $_SESSION['id']; // Admin id
	$ud = $_POST['userid'];
	if (sizeof($ud) == 1 && $ud[0] == 'all') {
		while ($r = mysqli_fetch_assoc($userresult)) {
			$userid[] = $r['id'];
		}
	} else {
		$userid = $_POST['userid'];
	}

	$title = $_POST['title'];
	$details = $_POST['details'];

	$users = '';
	$userArrlen = sizeof($userid);

	/*
	   foreach($userid as $key => $val){
		   if($userArrlen == 1 || $key == $userArrlen-1){
			   $users .= '"'.$val.'"';
			   break;
		   }else{
			   $users .= '"'.$val.'",';
		   }
	   }

	   $sql = "
		   INSERT INTO `notifications` (`id`, `sender_id`, `receiver_id`, `title`, `details`, `created_at`, `updated_at`) VALUES (NULL, '$senderid', '($users)', '$title', '$details', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)
	   ";
	   */

	foreach ($userid as $key => $val) {
		$sql = "
	    	INSERT INTO `notifications` (`id`, `sender_id`, `receiver_id`, `title`, `details`, `created_at`, `updated_at`) VALUES (NULL, '$senderid', '$val', '$title', '$details', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)
			    ";

		if (mysqli_query($conn, $sql)) {
			$success_message = "Notification sent successfully";
		} else {
			$error_message = "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	header("Location: " . $_SERVER['PHP_SELF']);

}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth font-semibold min-h-screen bg-cover bg-no-repeat w-full"
	style="background-image: url('images/Homepage bg .png'); backdrop-filter:blur(3px);">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Send Message</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
</head>

<body>
	<!-- Navbar -->
	<?php include('ui/header.php'); ?>
<div class="notifycard card text-center shadow-2xl rounded-xl bg-gray-200 p-10 m-4 md:m-10 lg:m-20">
    <span class="form-title">Send Message</span>
    <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
        <div class="mb-4">
            <label class="block mb-2">Select Users</label>
            <select name="userid[]" class="notify_selected_user border-2 border-gray-400 p-2 max-w-fit rounded-lg ring-2 ring-pink-400 focus:outline-none focus:ring-2 focus:ring-pink-400" multiple>
                <?php
                echo '<option value="all">All User</option>';
                if (mysqli_num_rows($userresult) > 0) {
                    while ($rows = mysqli_fetch_assoc($userresult)) {
                        echo '<option value="' . $rows["id"] . '">' . $rows["name"] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-2">Title</label>
            <input class="border-2 border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400" type="text" name="title" id="title" placeholder="Enter title" required />
        </div>
        <div class="mb-4">
            <label class="block mb-2">Details</label>
            <textarea class="border-2 border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400" name="details" id="details" placeholder="Enter details" required></textarea>
        </div>
        <div class="flex flex-col md:flex-row md:justify-between items-center">
            <button type="submit" value="sbmt" class="bg-pink-700  text-white hover:bg-gray-100 hover:text-gray-900 font-raleway p-4 rounded-full focus:outline-none focus:ring-2  hover:ring-pink-700 hover:ring-2  mb-4 md:mb-0">Send Message</button>
            <a href="adminDashboard.php" class="p-4 text-center hover:bg-gray-100 hover:text-gray-900 text-gray-100 bg-pink-700 rounded-full font-raleway hover:ring-pink-700 hover:ring-2 hover:translate-0 hover:transition-shadow self-start">Back to dashboard</a>
        </div>
    </form>
</div>


	

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function () {
			$('.notify_selected_user').select2();
		});
	</script>
</body>
<?php include('ui/footer.php'); ?>
</html>