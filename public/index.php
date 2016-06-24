<?php
require_once "../bootstrap.php";
require_once "../config.php";

/** @var  $instance */
$android = PushNotification\PushFactory::getInstance('android');
$s = $android
    ->withTokens([
    'TOKEN',
    ])
    ->withNotification(['title' => 'title', 'text' => 'Texto'])
    ->send();
