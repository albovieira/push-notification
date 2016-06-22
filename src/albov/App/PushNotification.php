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

    private $devideId;
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

        $response = $this->client->post(API_SEND_URL,[
            'headers' => self::headers(),
            'data' => $this->fields()
        ]);


        /*
        die();

        $request = new Request(
            'POST',
            API_SEND_URL,
            self::headers(),
            ['json' => $this->fields()]
        );
       // var_dump($request);die;

        $response = $this->client->send($request);
       // var_dump($response);die;
        /*
                $response = $this->client->post(API_SEND_URL,[
                    'headers' => self::headers(),
                    'json'    => $this->fields(),
                ]);

                var_dump($response->getStatusCode());
                var_dump($response->getBody());

        */

       /* $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        echo $result;*/

    }

    public static function headers(){
        return [
            'Authorization:key='.API_ACCESS_KEY,
            'Content-Type:application/json'
        ];
    }

    public function fields(){
        return [
            'registration_ids' 	=> ['3508CF525A2C074D'],
            'data'			=> Message::mockMsg()
        ];
    }

}