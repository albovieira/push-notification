<?php

namespace PushNotification\Gcm;

use GuzzleHttp\Client;
use PushNotification\Contract\PushContract;
use PushNotification\PushNotification;

class GcmPushNotification extends PushNotification implements PushContract
{

    const FAILURE = 1;

    private $config;
    private $response;

    /**
     * PushNotification constructor.
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->msg = new Message();
    }

    /**
     * Send a push notification
     *
     * @return array
     */
    public function send(){

        try{

            $client = new Client();
            $response = $client->post($this->config['GCM_URL'], [
                'headers' => $this->headers(),
                'json'    => $this->dataToSend(),
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Something wrong here!');
            }

            $this->response = $response;

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
    private function headers(){
        return [
            'Authorization' => 'key=' . $this->config['KEY_GOOGLE'],
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
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }


}