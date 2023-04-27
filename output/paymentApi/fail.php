<?php

if($_SERVER['REQUEST_METHOD']=="POST"){

    $paystatus=$_POST['pay_status'];
    $amount=$_POST['amount'];
    $trxnid=$_POST['pg_txnid'];
    $mer_trxnid=$_POST['mer_txnid'];
    $card=$_POST['card_type'];
   
    echo $paystatus."</br>";
    echo $amount."</br>";
    echo $trxnid."</br>";
    echo $mer_trxnid."</br>";
    echo $card."</br>";
    
    // echo $paystatus;
    // echo $amount;
    //you can get all parameter from post request
    //print_r($_POST);
}
?>