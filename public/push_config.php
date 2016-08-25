<?php

return array(
   'android' => [
        'KEY_GOOGLE' => '',
        'GCM_URL' => 'https://android.googleapis.com/gcm/send',
    ],
    'ios' => [
        'KEY_GOOGLE' => '',
        'APNS_URL' => 'gateway.sandbox.push.apple.com:2195',
        'CERTIFICATE_APNS' => '../ios_push_certificates/push_cert_dev.pem',
        'APNS_PASSPHRASE' => '',
    ]
);

