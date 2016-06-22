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
    private $message;
    private $title;
    private $subtitle;
    private $tickerText;
    private $vibrate;
    private $sound;
    private $largeIcon;
    private $smallIcon;

    /**
     * Message constructor.
     * @param $data
     */
    public function fill($data)
    {
        $this->message = !empty($data['message']) ? $data['message'] : '';
        $this->title = !empty($data['title']) ? $data['title'] : '';
        $this->subtitle = !empty($data['subtitle']) ? $data['subtitle'] : '';
        $this->tickerText = !empty($data['tickerText']) ? $data['tickerText'] : '';
        $this->vibrate = !empty($data['vibrate']) ? $data['vibrate'] : '';
        $this->sound = !empty($data['sound']) ? $data['sound'] : '';
        $this->largeIcon = !empty($data['largeIcon']) ? $data['largeIcon'] : '';
        $this->smallIcon = !empty($data['smallIcon']) ? $data['smallIcon'] : '';

    }

    public static function mockMsg(){

        return
            [   'message' 	=> 'here is a message. message',
                'title'		=> 'This is a title. title',
                'subtitle'	=> 'This is a subtitle. subtitle',
                'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
                'vibrate'	=> 1,
                'sound'		=> 1,
                'largeIcon'	=> 'large_icon',
                'smallIcon'	=> 'small_icon'
            ];
    }
}