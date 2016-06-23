<?php

/**
 * Created by PhpStorm.
 * User: albo-vieira
 * Date: 21/06/16
 * Time: 22:42
 */
namespace albov\App;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class PushNotification
{

    private $token;
    private $msg;
    private $client;

    /**
     * PushNotification constructor.
     */
    public function __construct()
    {
        $this->msg = new Message();
        $this->client = new Client();
    }

    public function push(){

        var_dump(self::headers());
        var_dump(json_encode($this->fields()));
        $response = $this->client->post(API_SEND_URL,[
            'headers' => self::headers(),
            'json' => json_encode($this->fields())
        ]);

    }

    public static function headers(){
        return [
            'Authorization:key= '.API_ACCESS_KEY,
            'Content-Type: application/json'
        ];
    }

    public function fields(){
        return [
            'data'			=> ['message' => 'Teste'],
            'registration_ids' 	=> ['3508CF525A2C074D']
        ];
    }

}