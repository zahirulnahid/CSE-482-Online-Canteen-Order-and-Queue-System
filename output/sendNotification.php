<!DOCTYPE html>
<?php
include('protection.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Send Notificaation</title>
    <link rel="stylesheet" href="outputstyles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Raleway:wght@200;500&display=swap"
    rel="stylesheet">
   <style type="text/css">
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
   </style>
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
	    $userid = $_POST['userid'];
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
	    foreach($userid as $key => $val){
	    	$sql = "
	    	INSERT INTO `notifications` (`id`, `sender_id`, `receiver_id`, `title`, `details`, `created_at`, `updated_at`) VALUES (NULL, '$senderid', '$val', '$title', '$details', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)
			    ";
			  	
			    if (mysqli_query($conn, $sql)) {
			        $success_message = "Notification send successfully";
			    } else {
			        $error_message = "Error: " . $sql . "<br>" . mysqli_error($conn);
			    }
	    } 
	}
	$conn->close();
?>
<body class=" scroll-smooth font-semibold min-h-screen bg-cover bg-no-repeat w-full"
    style="background-image: url('../images/Homepage bg .png'); backdrop-filter:blur(3px);">
    <!-- Navbar -->
    <?php include('ui/header.php'); ?>
    <div
        class=" notifycard card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
        <!-- <img src="../images/Burger.png" alt="Menu Item" class="rounded-t-lg mx-auto"> -->
        <div class="p-10">
        	<span class="form-title">Send Messaage</span>
	    	<form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
	    		<div class="mb-4">
	    			<label>User</label>
	    			<select name="userid[]" class="notify_selected_user border-2 border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400" multiple>
		    		<?php
		    			echo '<option value="">Select User</option>';
		    			if (mysqli_num_rows($userresult) > 0) {
		    				while ($rows = mysqli_fetch_assoc($userresult)) {
		    					echo '<option value="'.$rows["id"].'">'.$rows["name"].'</option>';
		    				}
		    			}
	    			?>
	    			</select>
	    		</div>
		        <div class="mb-4">
		        	<label>Title</label>
		            <input
		                class="border-2 border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
		                type="text" name="title" id="title" placeholder="Enter title" required />
		        </div>
		        <div class="mb-4">
		        	<label>Details</label>
		            <textarea
		                class="border-2 border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
		                type="text" name="details" id="details" placeholder="Enter details" required ></textarea>
		        </div>
		        <button type="submit" value="sbmt" class="bg-pink-500 hover:bg-pink-700 text-white font-raleway py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-pink-400" />Send Message</button>
		    </form>
		</div>
	</div>
    <?php include ('ui/footer.php');?>
</body>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.notify_selected_user').select2();
		});
	    /*$(document).ready(function () {
	        <?php if (isset($success_message)): ?>
	            $('#successModal').modal('show');
	        <?php elseif (isset($error_message)): ?>
	            $('#errorModal').modal('show');
	        <?php else: ?>
	        	$('#successModal').modal('hide');
	        	$('#errorModal').modal('hide');
	        <?php endif; ?>
	    });*/
	    jQuery(document).ready(function () {
	        jQuery(window).scroll(function () {
	            if (jQuery(window).scrollTop() >= jQuery(document).height() - jQuery(window).height()) {
	                loadMore(loadFlag);
	            }
	        });
	    });
	</script>
</html>