<?php
require_once "../bootstrap.php";
require_once "../config.php";

$collection = new \PushNotification\Device\Collection();
$collection->add('4654das4da56s4das4d65as4d6a4d6a4s6d4a54d6a5s4');
$collection->add('87ddsa7das987d987sad4sa5d6a4d98as74da4s5d4sa6');
$collection->add('654654d7s8ad7as9d7sad7sa97d9a8d7a9s87s89d7a7d');
$collection->add('36354dsa4d6d4a5sd4sadsa4d54das5d4a6ds6ad4a5ds');
$collection->add('7567d56as7d6asd68a7sdsa8das7d897asd9as5d4sa8d');


/*$fn = function () use ($collection) {
    return strpos()
};*/
//$arr = $collection->;
$fn = function ($val){
    return $val == '7567d56as7d6asd68a7sdsa8das7d897asd9as5d4sa8d';
};

//$arr = array_map( $fn , $collection->toArray());
$collection->filter($fn);

var_dump($collection);die;

/*
$ios = PushNotification\PushFactory::getInstance('ios')
    ->withTokens(['e0ba1fb9baf32dff805d30bdba786b8627182dc9aa0772082082ca05d168902d'])
    ->withNotification(['alert' => 'Texto', 'badge' => 1, 'sound' => 'default'])
    ->send();

$android = PushNotification\PushFactory::getInstance('android')
    ->withTokens([
        'coelvf6GOFY:APA91bHg0K7fr5kjNxKNSEecltaYQWnpuXnRT81vIaQyr4j2u9A_MsKIG9EpgQe_9EvIUyHB0zQiiNIkm1RDaimFf-VX0uxKpV3yaph1P9_uq9oel1nzC-K5v6CvHt7-4mAHx6x2425z',
    ])
    ->withNotification(['title' => 'title', 'text' => 'Texto'])
    ->send();*/
