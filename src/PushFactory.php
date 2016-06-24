<?php

namespace PushNotification;

use PushNotification\Contract\PushContract;

class PushFactory
{
    const ANDROID = 'android';
    const IOS = 'ios';

    /**
     * @param $os
     * @return PushContract
     */
    public static function getInstance($os){

        switch ($os){
            case self::ANDROID:
                return new GcmPushNotification();
                break;
            case self::IOS:
                break;

        }
    }

}