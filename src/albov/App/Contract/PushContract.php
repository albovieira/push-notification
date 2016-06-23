<?php

/**
 * Created by PhpStorm.
 * User: albo-vieira
 * Date: 23/06/16
 * Time: 11:49
 */
namespace albov\App\Contract;

interface PushContract
{
    /**
     * Push the notification
     *
     * @return mixed
     */
    public function push();

    /**
     * Retrives the http header
     *
     * @return array
     */
    public static function headers();

    /**
     * Retrives the data to send
     *
     * @return array
     */
    public function dataToSend();

    /**
     * Set a token for push the notifications
     *
     * @param $tokens
     * @return mixed
     */
    public function withToken($tokens);

    /**
     * Set a content for notification
     *
     * @param $title
     * @param $text
     * @return mixed
     */
    public function withNotificationContent($title, $text);
}