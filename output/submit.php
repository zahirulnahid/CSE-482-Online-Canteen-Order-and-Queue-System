<?php
require('config.php');
include("protection.php");

// \Stripe\Stripe::setVerifySslCerts(false);

$token = $_POST['stripeToken'];


$data= \Stripe\Charge::create(array (
    "amount"=>$_POST["amount"],
        "currency"=>"bdt",
        "description"=>"NSU canteen",
        "source"=>$token,
  )
);
// echo "<pre>";
// print_r($data);
// echo "</pre>";
?>
