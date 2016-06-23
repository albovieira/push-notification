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
    private $tokens;
    private $notification;

    /**
     * PushNotification constructor.
     */
    public function __construct()
    {
        $this->msg = new Message();
    }

    public function push($title,$text){

        $client = new Client();
        $response = $client->post(API_SEND_URL,[
            'headers' => self::headers(),
            'json'    => $this->msg->render(),
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

    public function dataToSend(){
        return [
            'to' 	=> $this->tokens,
            'notification'	=> $this->notification
        ];
    }

    public function withToken($token){
        $this->tokens = $token;
        return $this;
    }

    public function withNotificationContent($title, $text){
        $this->msg->fill($title, $text);
        return $this;
    }

}