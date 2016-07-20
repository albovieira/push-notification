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
     * Set tokens for push the notifications
     *
     * @param $tokens
     * @return mixed
     */
    public function withTokens(array $tokens);

    /**
     * Add a token for push the notifications
     *
     * @param $token
     * @return mixed
     */
    public function addToken($token);

    /**
     * Set a content for notification
     *
     * @param $options
     * @return mixed
     */
    public function withNotification(array $options);


    /**
     * @return array
     */
    public function getTokens();
}