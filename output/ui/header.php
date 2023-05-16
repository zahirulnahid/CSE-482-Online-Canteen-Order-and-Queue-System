<?php
$userType[4]=array('adminDashboard.php','manageAccount.php','pendingAccount.php','salesInfo.php','updateMenu.php','orderHistory.php');
//(USER)
$userType[1]=array('homepage.php','invoice.php','myOrders.php','success.php');
$userType[2]=$userType[1];
//(STAFF)
$userType[3]=array('serverDashboard.php');
$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
if(in_array($curPageName,$userType[$_SESSION["userType"]])){

}
else header("location: ".$userType[$_SESSION["userType"]][0]."");
?>
<nav class="bg-pink-800 py-4 px-4 sm:px-6 lg:px-14 z-10">
    <div class="container mx-auto flex justify-between items-center">
        <a href="<?php echo $userType[$_SESSION["userType"]][0]?>" class="text-gray-100 text-2xl border-white font-fatface">NSU Canteen</a>
        <div class="hidden sm:block">
            <a href="login.php" class="bg-gray-50 hover:bg-pink-700 hover:text-white text-black font-raleway py-3 px-5 rounded-full
             ring-2 ring-pink-900 hover:ring-2 hover:ring-pink-500 w-full hover:translate-0 hover:transition-shadow">Log
                Out</a>
        </div>
        <!-- <button class="sm:hidden text-gray-400 hover:text-white focus:outline-black focus:ring-2 focus:ring-pink-400"
            id="menu-button">
            <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z" />
            </svg>
        </button> -->
    </div>
    <div class="sm:hidden" id="menu">
        <a href="login.php"
            class="flex bg-pink-700 hover:bg-pink-50 hover:text-black text-white font-raleway py-3 px-5 rounded-full
      focus:outline-black hover:ring-2 hover:ring-pink-600 w-fit mx-auto  hover:translate-0 hover:transition-shadow">Log Out</a>
    </div>
</nav>