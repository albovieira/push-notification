<?php

/**
 * Created by PhpStorm.
 * User: albo-vieira
 * Date: 21/06/16
 * Time: 22:42
 */
namespace albov\App;

use albov\App\Contract\PushContract;

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