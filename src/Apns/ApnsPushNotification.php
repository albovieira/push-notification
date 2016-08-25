<?php

namespace PushNotification\Apns;

use PushNotification\Contract\PushContract;
use PushNotification\PushNotification;

class ApnsPushNotification extends PushNotification implements PushContract
{

    private $config;

    /**
     * ApnsPushNotification constructor.
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->msg = new Message();
    }

    /**
     * @return array
     */
    public function send()
    {
        try {

            $payload = json_encode($this->dataToSend());

            $apns = $this->openSocket();

            foreach ($this->tokens as $token) {
                $apnsMessage = chr(0) . chr(0) . chr(32) . pack('H*', str_replace(' ', '', $token)) . chr(0) .
                    chr(strlen($payload)) . $payload;

                $wrote = fwrite($apns, $apnsMessage, strlen($apnsMessage));
                if (!$wrote) {
                    throw new \Exception("Message don't delivered");
                }
            }

            $this->closeSocket($apns);

            return ['status' => 'success'];


        } catch (\Exception $e) {

            return ['status' => 'failure', 'message' => $e->getMessage()];
        }

    }

    /**
     * @return array
     */
    private function dataToSend()
    {
        return [
            'aps' => $this->msg->render()
        ];
    }


    /**
     * @return resource
     * @throws \Exception
     */
    private function openSocket()
    {

        $streamContext = stream_context_create();
        stream_context_set_option($streamContext, 'ssl', 'local_cert', $this->config['CERTIFICATE_APNS']);

        $apns = stream_socket_client(
            'ssl://' . $this->config['APNS_URL'], $error, $errorString, 2, STREAM_CLIENT_CONNECT, $streamContext
        );
        if (!$apns) {
            throw new \Exception("Connection failed:  $error $errorString");
        }
        return $apns;
    }

    /**
     * @param $apns
     */
    private function closeSocket($apns)
    {
        @socket_close($apns);
        @fclose($apns);
    }


}