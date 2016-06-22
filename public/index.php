<?php
require_once "../bootstrap.php";
require_once "../config.php";

$push = new \albov\App\PushNotification();

var_dump($push->push());