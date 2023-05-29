<?php 
require('stripe-php-master/init.php');

$publishableKey="pk_test_51N6wRoCTMtJu4CIwVY9pADeVsg3dgPlOnE669GWeuMskwfvrsOtfeeGjlgCgbrCpvqL1Ya0n9tEJhDn3KXjNpYQr00QAZNLran";
$secretKey="sk_test_51N6wRoCTMtJu4CIwBP0VNN33T1cQh7mxLFQ098AunsbCcPWW7HPED7uqnBuQ9azOGMvABGY7agO9Y840GKvH5qqw00gJZEKDvQ";

// set the secret key from a function provided by the API in the init.php file
\Stripe\Stripe::setApiKey($secretKey);



?>