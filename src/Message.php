<?php

namespace PushNotification;

class Message
{
    private $title;
    private $text;

    /**
     * @param $options
     * @return $this
     */
    public function fill(array $options)
    {
        $this->title = $options['title'];
        $this->text = $options['text'];

        return $this;
    }

    /**
     * @return array
     */
    public function render(){
        return
            [
                'title'		=> $this->title,
                'text' 	=> $this->text,
            ];
    }
}