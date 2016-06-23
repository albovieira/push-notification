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
     * Message constructor.
     * @param $data
     */
    public function fill($data)
    {
        $this->title = !empty($data['title']) ? $data['title'] : '';
        $this->text = !empty($data['text']) ? $data['text'] : '';

    }

    public static function mockMsg(){
        return
            [
                'title'		=> 'Vamos praticar?',
                'text' 	=> 'A pratica leva a perfeicao',
            ];
    }
}