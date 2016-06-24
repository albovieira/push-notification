<?php

namespace PushNotification;

use GuzzleHttp\Client;
use PushNotification\Contract\PushContract;

class GcmPushNotification implements PushContract
{

    private $msg;
    private $tokens;
    const FAILURE = 1;

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
    public function send(){

        try{

            $client = new Client();
            $response = $client->post(API_SEND_URL,[
                'headers' => self::headers(),
                'json'    => $this->dataToSend(),
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Something wrong here!');
            }

            $data = json_decode($response->getBody()->getContents());
            $results = $data->results;

            if ($data->failure == self::FAILURE) {
                $errors = reset($results)->error;
                throw new \Exception($errors);
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
    private static function headers(){
        return [
            'Authorization' => 'key='.API_GOOGLE_KEY,
            'Content-Type' => 'application/json'
        ];
    }

    /**
     * @return array
     */
    private function dataToSend(){
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
    public function withNotification(array $options)
    {
        $this->msg->fill($options);
        return $this;
    }

}