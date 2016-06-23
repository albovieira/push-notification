<?php
require_once "../bootstrap.php";
require_once "../config.php";

$pushNotification = new \albov\App\PushNotification();
$pushNotification->push('google');
