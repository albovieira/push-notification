<?php
require_once "../bootstrap.php";
require_once "../config.php";

/** @var  $instance */
$android = \albov\App\PushFactory::getInstance('android');
$android
    ->withTokens([
    'TOKEN',
    ])
    ->withNotificationContent(['title' => 'title', 'text' => 'Texto'])
    ->send();