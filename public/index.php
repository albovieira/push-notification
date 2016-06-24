<?php
require_once "../bootstrap.php";
require_once "../config.php";

/** @var  $instance */
$android = \albov\App\PushFactory::getInstance('android');
$android
    ->withTokens([
    'coelvf6GOFY:APA91bHg0K7fr5kjNxKNSEecltaYQWnpuXnRT81vIaQyr4j2u9A_MsKIG9EpgQe_9EvIUyHB0zQiiNIkm1RDaimFf-VX0uxKpV3yaph1P9_uq9oel1nzC-K5v6CvHt7-4mAHx6x2425z',
    ])
    ->withNotificationContent(['title' => 'title', 'text' => 'Texto'])
    ->push();