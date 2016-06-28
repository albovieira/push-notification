<?php

namespace PushNotification\Gcm;

use PushNotification\Contract\MessageContract;

class Message implements MessageContract
{
    private $title;
    private $text;

    /**
     * @param $options
     * @return $this
     */
    public function fill(array $options)
    {
        $this->title = !empty($options['title']) ? $options['title'] : '';
        $this->text = !empty($options['text']) ? $options['text'] : '';

        return $this;
    }

    /**
     * @return array
     */
    public function render()
    {
        return
            [
                'title' => $this->title,
                'text' => $this->text,
            ];
    }
}