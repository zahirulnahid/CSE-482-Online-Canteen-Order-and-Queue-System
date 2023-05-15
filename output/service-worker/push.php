<?php
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;
// use Minishlink\WebPush\VAPID;

require "includes/database.php";
require 'web-push/vendor/autoload.php';

// var_dump(VAPID::createVapidKeys());
// die;

$publicKey = "BMjVmtTJHYcEeD1rX3u8exUeH43GK-BTiG1mDTkxfDYxUb_2ki5yJIJdIGIvkVyVrbQmpVPcQ26W-f4W7fxOgVw";
$privateKey = "g-MkUsqkYbkXCwuxEfbty3iqoGgRxDjL4Hk6RPeIeHc";

$message = json_encode([
    'title' => 'Push Message!',
    'body' => 'Yay it works.',
    'extraData' => 'https://thintake.in?ref=push-message'
]);


$time = time();
$query = $con->query("SELECT * FROM `push_subscribers` WHERE `expirationTime` = 0 OR `expirationTime` > '{$time}'");
if($query->num_rows > 0){
    $auth = [
        'VAPID' => [
            'subject' => 'https://thintake.in', // can be a mailto: or your website address
            'publicKey' => $publicKey, // (recommended) uncompressed public key P-256 encoded in Base64-URL
            'privateKey' => $privateKey, // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL
        ],
    ];
    $webPush = new WebPush($auth);

    while ($subscriber = $query->fetch_assoc()) {
        $subscription = Subscription::create([
                "endpoint" => $subscriber['endpoint'],
                "keys" => [
                    'p256dh' => $subscriber['p256dh'],
                    'auth' => $subscriber['authKey']
                ]
            ]);
        $webPush->queueNotification($subscription, $message);
    }

    foreach ($webPush->flush() as $report) {
        $endpoint = $report->getRequest()->getUri()->__toString();
    
        if ($report->isSuccess()) {
            echo "Message sent successfully for {$endpoint}.<br>";
        } else {
            echo "Message failed to sent for {$endpoint}: {$report->getReason()}.<br>";
        }
    }
}
else{
    echo "No Subscribers";
}