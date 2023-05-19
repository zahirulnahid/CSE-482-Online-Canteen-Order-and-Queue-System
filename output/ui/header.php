<?php
$userType[4]=array('adminDashboard.php','manageAccount.php','pendingAccount.php','salesInfo.php','updateMenu.php','sendNotification.php','orderHistory.php');
//(USER)
$userType[1]=array('homepage.php','invoice.php','myOrders.php','success.php');
$userType[2]=$userType[1];
//(STAFF)
$userType[3]=array('serverDashboard.php');
$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
if(in_array($curPageName,$userType[$_SESSION["userType"]])){
}
else header("location: ".$userType[$_SESSION["userType"]][0]."");
include("connection.php"); //Created connection with DB//
// Notification counter
$userid = $_SESSION['id'];
$sql = "SELECT count(id) as totalsms FROM notifications
     WHERE receiver_id = '$userid' AND status = 0";
$result = mysqli_query($conn, $sql);
// Update notification to seen
if(isset($_GET['nid']) && !empty($_GET['nid'])){
    $nid = $_GET['nid'];
    $sql = "UPDATE notifications SET status = 1
         WHERE id = $nid ";
    mysqli_query($conn, $sql);
}
?>
<style type="text/css">
    .nlist {
        width: 20%;
        background: #82858d;
        right: 15px;
        margin-top: 16px;
        padding: 15px;
        z-index: 9999;
        position: absolute;
        /* margin-right: 136px; */
        border-bottom: 1px solid #fff;
        color: #fff;
    }
    .nlist li {
        padding: 15px;
    }
</style>
<nav class="bg-gray-900 bg-opacity-50 py-4 px-4 sm:px-6 lg:px-14 z-10">
    <div class="container mx-auto flex justify-between items-center">
        <a href="<?php echo $userType[$_SESSION["userType"]][0]?>" class="text-gray-100 text-2xl border-white font-fatface">NSU Canteen</a>
        <div class="hidden sm:block">
            <span class="notify" style="background:red;color:#fff;font-weight: 600;padding: 20px;margin-right: 20px;">
                <?php 
                    echo 'Notification'; 
                    $rows = mysqli_fetch_assoc($result); 
                    echo "( ".$rows['totalsms']." )";
                ?>
            </span>
            <a href="login.php" class="bg-pink-700 hover:bg-white hover:text-black text-white font-raleway py-3 px-5 rounded-full
      focus:outline-black hover:ring-2 hover:ring-pink-600 w-full hover:translate-0 hover:transition-shadow">Log
                Out</a>
        </div>
        <!-- <button class="sm:hidden text-gray-400 hover:text-white focus:outline-black focus:ring-2 focus:ring-pink-400"
            id="menu-button">
            <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z" />
            </svg>
        </button> -->
    </div>
    <div class="nlist" style="">
        <h3 style="width:38%;margin: 0 auto;padding-bottom: 10px;">Notification List</h3>
        <hr>
        <?php 
            $sql = "SELECT id,title FROM notifications
                WHERE receiver_id = '$userid' AND status = 0    ";
            $res = mysqli_query($conn, $sql);
            echo '<ul>';
            if (mysqli_num_rows($res) > 0) {
                while ($rows = mysqli_fetch_assoc($res)) {
                    $notificationId = $rows["id"];
                    echo '<li><a href="'.$_SERVER['PHP_SELF'].'?nid='.$notificationId.'">'.$rows["title"].'</li>';
                }
            }else{
                echo '<li>No notification</li>';
            }
            echo '</ul>';
        ?>
    </div>
    <div class="sm:hidden" id="menu">
        <span style="background:red;color:#fff;font-weight: 600;padding: 20px;margin-right: 20px;">Notification (0) </span>
        <a href="login.php"
            class="flex bg-pink-700 hover:bg-pink-50 hover:text-black text-white font-raleway py-3 px-5 rounded-full
      focus:outline-black hover:ring-2 hover:ring-pink-600 w-fit mx-auto  hover:translate-0 hover:transition-shadow">Log Out</a>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('.nlist').hide();
      $('.notify').click(function() {
        $('.nlist').toggle();
      });
    });
</script>