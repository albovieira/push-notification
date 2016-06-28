<?php

namespace PushNotification;

use PushNotification\Contract\MessageContract;

abstract class PushNotification
{

    const FAILURE = 1;

    /**
     * @var MessageContract
     */
    protected $msg;
    /**
     * @var
     */
    protected $tokens;

    /**
     * @param $tokens
     * @return $this
     */
    public function withTokens($tokens)
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