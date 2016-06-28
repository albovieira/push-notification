<?php

namespace PushNotification\Apns;

use PushNotification\Contract\MessageContract;

class Message implements MessageContract
{
    private $alert;
    private $badge;
    private $sound;

    public function fill(array $options)
    {
        $this->alert = !empty($options['alert']) ? $options['alert'] : '';
        $this->badge = !empty($options['badge']) ? $options['badge'] : '';
        $this->sound = !empty($options['sound']) ? $options['sound'] : '';

        return $this;
    }

    /**
     * @return array
     */
    public function render()
    {
        return
            [
                'alert' => $this->alert,
                'badge' => $this->badge,
                'sound' => $this->sound,
            ];
    }
}