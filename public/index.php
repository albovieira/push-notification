<?php
require_once "../bootstrap.php";
require_once "../config.php";

/** @var  $instance */
$android = PushNotification\PushFactory::getInstance('android');
$android
    ->withTokens([
    'TOKEN',
    ])
    ->withNotificationContent(['title' => 'title', 'text' => 'Texto'])
    ->send();