<?php

/**
 * Created by PhpStorm.
 * User: albo-vieira
 * Date: 21/06/16
 * Time: 22:42
 */
namespace albov\App;

use albov\App\Contract\PushContract;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Stream;

class GcmPushNotification implements PushContract
{

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
            'json'    => $this->dataToSend('p1',[]),
        ]);

        if($response->getStatusCode() == 200){
            return true;
        }
    }

    public static function headers(){
        return [
            'Authorization' => 'key='.API_ACCESS_KEY,
            'Content-Type' => 'application/json'
        ];
    }

    public function dataToSend($token, array $options){
        return [
            'to' 	=> 'coelvf6GOFY:APA91bHg0K7fr5kjNxKNSEecltaYQWnpuXnRT81vIaQyr4j2u9A_MsKIG9EpgQe_9EvIUyHB0zQiiNIkm1RDaimFf-VX0uxKpV3yaph1P9_uq9oel1nzC-K5v6CvHt7-4mAHx6x2425z',
            'notification'	=> Message::mockMsg()
        ];
    }

}