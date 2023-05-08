<?php
session_start();
//(ADMIN)
$userType[4]=array('adminDashboard.php','manageAccount.php','pendingAccount.php','salesInfo.php','updateMenu.php','orderHistory.php');
//(USER)
$userType[1]=array('homepage.php','invoice.php','myOrders.php');
$userType[2]=$userType[1];
//(STAFF)
$userType[3]=array('serverDashboard.php');
$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
if(in_array($curPageName,$userType[$_SESSION["userType"]])){

}
else header("location: ".$userType[$_SESSION["userType"]][0]."");
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
    //auth or send to login page
} else
    include('connection.php');
?>