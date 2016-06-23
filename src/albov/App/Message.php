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

    public function fill($title, $text)
    {
        $this->title = $title;
        $this->text = $text;

        return $this;
    }

    public function render(){
        return
            [
                'title'		=> $this->title,
                'text' 	=> $this->text,
            ];
    }
}