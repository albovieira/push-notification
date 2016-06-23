<?php

/**
 * Created by PhpStorm.
 * User: albo-vieira
 * Date: 21/06/16
 * Time: 22:42
 */
namespace albov\App;

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