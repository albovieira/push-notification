<?php
require_once "../bootstrap.php";
$pushConfig = include('push_config.php');

$result = $ios = PushNotification\PushFactory::getInstance('ios', $pushConfig)
    ->withTokens(['TOKENS'])
    ->withNotification(['alert' => 'Texto', 'badge' => 1, 'sound' => 'default'])
    ->send();
print_r($result);

$result = $android = PushNotification\PushFactory::getInstance('android', $pushConfig)
    ->withTokens([
        'TOKENS',
    ])
    ->withNotification(['title' => 'title', 'text' => 'Texto'])
    ->send();
print_r($result);



