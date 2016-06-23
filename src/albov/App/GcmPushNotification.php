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

    /**
     * PushNotification constructor.
     */
    public function __construct()
    {
        $this->msg = new Message();
    }

    /**
     * @return bool
     */
    public function push(){

        $client = new Client();
        $response = $client->post(API_SEND_URL,[
            'headers' => self::headers(),
            'json'    => $this->dataToSend(),
        ]);

        if($response->getStatusCode() == 200){
            return true;
        }
    }

    /**
     * @return array
     */
    public static function headers(){
        return [
            'Authorization' => 'key='.API_ACCESS_KEY,
            'Content-Type' => 'application/json'
        ];
    }

    /**
     * @return array
     */
    public function dataToSend(){
        return [
            'to' 	=> $this->tokens,
            'notification'	=> $this->msg->render()
        ];
    }

    /**
     * @param $token
     * @return $this
     */
    public function withToken($token){
        $this->tokens = $token;
        return $this;
    }

    /**
     * @param $title
     * @param $text
     * @return $this
     */
    public function withNotificationContent($title, $text){
        $this->msg->fill($title, $text);
        return $this;
    }

}