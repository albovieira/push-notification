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
    public static function create($os)
    {

        switch ($os){
            case self::ANDROID:
                return new GcmPushNotification();
                break;
            case self::IOS:
                return new ApnsPushNotification();
                break;
        }
    }

}