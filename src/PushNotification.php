<?php

namespace PushNotification;

use PushNotification\Contract\MessageContract;

abstract class PushNotification
{

    /**
     * @var MessageContract
     */
    protected $msg;
    protected $tokens;

    /**
     * @param $token
     * @return $this
     */
    public function addToken($token)
    {
        $this->tokens[] = $token;
        return $this;
    }

    /**
     * @param $tokens
     * @return $this
     */
    public function withTokens(array $tokens)
    {
        $this->tokens = $tokens;
        return $this;
    }

    /**
     * @param $options
     * @return $this
     */
    public function withNotification(array $options)
    {
        $this->msg->fill($options);
        return $this;
    }

    /**
     * @return array
     */
    public function getTokens()
    {
        return $this->tokens;
    }

}