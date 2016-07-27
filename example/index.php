<?php
require_once "../bootstrap.php";
require_once "../config.php";


$ios = PushNotification\PushFactory::create('ios')
    ->withTokens(['TOKEN'])
    ->withNotification(['alert' => 'Texto', 'badge' => 1, 'sound' => 'default'])
    ->send();

$android = PushNotification\PushFactory::create('android')
    ->withTokens([
        'TOKEN',
    ])
    ->withNotification(['title' => 'title', 'text' => 'Texto'])
    ->send();
