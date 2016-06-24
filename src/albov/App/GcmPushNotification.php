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

        try{

            $client = new Client();
            $response = $client->post(API_SEND_URL,[
                'headers' => self::headers(),
                'json'    => $this->dataToSend(),
            ]);

            if(!$response->getStatusCode() == 200){
                throw new \Exception('Sometinh wrong here!');
            }

            return ['status' => 'success'];

        }
        catch (\Exception $e){

            return ['status' => 'failure', 'message' => $e->getMessage()];
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
            'registration_ids' 	=> $this->tokens,
            'notification'	=> $this->msg->render()
        ];
    }

    /**
     * @param $tokens
     * @return $this
     */
    public function withTokens($tokens){
        $this->tokens = $tokens;
        return $this;
    }

    /**
     * @param $options
     * @return $this
     */
    public function withNotificationContent(array $options){
        $this->msg->fill($options);
        return $this;
    }

}