<?php
require_once "../bootstrap.php";
require_once "../config.php";


$collection = new \PushNotification\Device\Collection();
$collection->add(1, 1);
$collection->add(2);
$collection->add(3);

//var_dump($collection->get(1));
//die;
$collection->add([1 => '1']);
$collection->clear();
//$collection->offsetUnset(1);
var_dump($collection);
die;

$ios = PushNotification\PushFactory::getInstance('ios')
    ->withTokens(['e0ba1fb9baf32dff805d30bdba786b8627182dc9aa0772082082ca05d168902d'])
    ->withNotification(['alert' => 'Texto', 'badge' => 1, 'sound' => 'default'])
    ->send();

/*$android = PushNotification\PushFactory::getInstance('android')
    ->withTokens([
        'coelvf6GOFY:APA91bHg0K7fr5kjNxKNSEecltaYQWnpuXnRT81vIaQyr4j2u9A_MsKIG9EpgQe_9EvIUyHB0zQiiNIkm1RDaimFf-VX0uxKpV3yaph1P9_uq9oel1nzC-K5v6CvHt7-4mAHx6x2425z',
    ])
    ->withNotification(['title' => 'title', 'text' => 'Texto'])
    ->send();*/
