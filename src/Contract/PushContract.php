<?php

namespace PushNotification\Contract;

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
    public function withNotification(array $options);
}