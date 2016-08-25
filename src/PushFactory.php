<?php

namespace PushNotification;

use PushNotification\Apns\ApnsPushNotification;
use PushNotification\Contract\PushContract;
use PushNotification\Gcm\GcmPushNotification;

class PushFactory
{
    const ANDROID = 'android';
    const IOS = 'ios';

    /**
     * @param $os
     * @return PushContract
     */
    public static function getInstance($os, $config){

        $config = $config[$os];

        switch ($os){
            case self::ANDROID:
                return new GcmPushNotification($config);
                break;
            case self::IOS:
                return new ApnsPushNotification($config);
                break;
        }
    }

}