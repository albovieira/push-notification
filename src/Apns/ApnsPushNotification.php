<?php

namespace PushNotification\Apns;

use PushNotification\Contract\PushContract;

class ApnsPushNotification implements PushContract
{

    private $tokens;
    private $msg;

    /**
     * ApnsPushNotification constructor.
     */
    public function __construct()
    {
        $this->msg = new Message();
    }

    /**
     * @return array
     */
    public function send()
    {
        try {

            $payload = json_encode($this->dataToSend());
            $streamContext = stream_context_create();
            stream_context_set_option($streamContext, 'ssl', 'local_cert', CERTIFICATE_IOS);

            $apns = stream_socket_client(
                'ssl://' . APNS_URL, $error, $errorString, 2, STREAM_CLIENT_CONNECT, $streamContext
            );


            if (!$apns) {
                throw new \Exception("Connection failed:  $error $errorString" . PHP_EOL);
            }

            foreach ($this->tokens as $token) {
                $apnsMessage = chr(0) . chr(0) . chr(32) . pack('H*', str_replace(' ', '', $token)) . chr(0) .
                    chr(strlen($payload)) . $payload;

                //$tMsg = chr (0) . chr (0) . chr (32) . pack ('H*', $tToken) . pack ('n', strlen ($tBody)) . $tBody;
                //$tMsg = chr (0) . chr (0) . chr (32) . pack ('H*', $tToken) . pack ('n', strlen ($tBody)) . $tBody;
                //$tResult = fwrite ($tSocket, $tMsg, strlen ($tMsg));

                $wrote = fwrite($apns, $apnsMessage, strlen($apnsMessage));
                if (!$wrote) {
                    throw new \Exception("Message delivered");
                }
            }

            @socket_close($apns);
            @fclose($apns);

            return ['status' => 'success'];


        } catch (\Exception $e) {

            return ['status' => 'failure', 'message' => $e->getMessage()];
        }

    }

    /**
     * @param $tokens
     * @return $this
     */
    public function withTokens($tokens)
    {
        $this->tokens = $tokens;
        return $this;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function withNotification(array $options)
    {
        $this->msg->fill($options);
        return $this;
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


}