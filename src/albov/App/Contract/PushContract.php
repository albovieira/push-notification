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
     * Send a push notification
     *
     * @return mixed
     */
    public function send();

    /**
     * Set a token for push the notifications
     *
     * @param $tokens
     * @return mixed
     */
    public function withTokens($tokens);

    /**
     * Set a content for notification
     *
     * @param $options
     * @return mixed
     */
    public function withNotificationContent(array $options);
}