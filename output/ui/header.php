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
<script src="service-worker/index.js"></script>
<nav class="bg-pink-700 py-4 px-4 sm:px-6 md:px-14 z-10">
    <div class="container mx-auto flex justify-between items-center">
        <a href="<?php echo $userType[$_SESSION["userType"]][0];?>" class="text-gray-100 text-2xl border-white font-fatface">NSU Canteen</a>
        <div class="relative flex items-center">
        <a href="queue.php" class="inline-block flex justify-center items-center bg-gray-100 hover:bg-pink-700 hover:text-white text-black font-raleway py-3 px-5 rounded-full hover:ring-2 hover:ring-white hover:translate-0 hover:transition-shadow ml-4 mr-4">
                Queue
            </a>
            <div class="dropdown inline-block relative">
                <button class="notify bg-yellow-100 bg-opacity-0 text-white font-semibold py-3 px-5 rounded-full ring-2 ring-yellow-300 hover:ring-2 hover:ring-white hover:translate-0 hover:transition-shadow">
                🔔
                    <?php
                   
                    $rows = mysqli_fetch_assoc($result);
                    echo "(<span id='notification-count'>" . $rows['totalsms'] . "</span>)";
                    ?>
                </button>
                <ul id="notification" class="dropdown-menu absolute hidden text-gray-700 bg-white mt-2 rounded-lg divide-y divide-gray-200">
                    <?php
                    $sql = "SELECT * FROM notifications WHERE receiver_id = '$userid' AND status = 0";
                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res) > 0) {$_SESSION["notificationCount"]=0;
                        while ($rows = mysqli_fetch_assoc($res)) {
                            $notificationId = $rows["id"];
                          //  echo"<script>main('".$rows["title"]."','".$rows["details"]."')</script>";
                            echo '<li><a href="' . $_SERVER['PHP_SELF'] . '?nid=' . $notificationId . '" class="block px-4 py-3 hover:bg-gray-100">' . $rows["title"] . '<br>' . $rows["details"] . '</a></li>';

                            $_SESSION["notificationCount"]++;

                         }
                    } else {
                        echo '<li><span class="block px-4 py-3">No notification</span></li>';$_SESSION["notificationCount"]=0;
                        $_SESSION["notificationCount"]=0;
                    }
                    ?>
                </ul>
            </div>
            <a href="login.php" class="inline-block flex justify-center items-center bg-gray-100 hover:bg-pink-700 hover:text-white text-black font-raleway py-3 px-5 rounded-full hover:ring-2 hover:ring-white hover:translate-0 hover:transition-shadow ml-4">
                <i class="fas fa-sign-out-alt"></i> Log Out
            </a>
        </div>
    </div>
</nav>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var dropdowns = document.getElementsByClassName("dropdown");

        Array.from(dropdowns).forEach(function(dropdown) {
            var button = dropdown.querySelector(".notify");
            var menu = dropdown.querySelector(".dropdown-menu");

            button.addEventListener("click", function() {
                menu.classList.toggle("hidden");
            });

            document.addEventListener("click", function(event) {
                if (!dropdown.contains(event.target)) {
                    menu.classList.add("hidden");
                }
            });
        });
    });
</script>

