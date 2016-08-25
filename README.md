# push-notification
Send push-notifications for Android(with GCM) and IOS.

# Install
```sh
composer require albo-vieira/push-notification dev-dev 
```

# Usage

ANDROID
```sh
$result = $android = PushNotification\PushFactory::getInstance('android', $pushConfig)
    ->withTokens([
        'TOKENS',
    ])
    ->withNotification(['title' => 'title', 'text' => 'Texto'])
    ->send();
print_r($result);  
```


IOS
```sh
$result = $ios = PushNotification\PushFactory::getInstance('ios', $pushConfig)
    ->withTokens(['TOKENS'])
    ->withNotification(['alert' => 'Texto', 'badge' => 1, 'sound' => 'default'])
    ->send();
print_r($result);
```
    
