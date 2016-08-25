# push-notification
Send push-notifications for Android(with GCM) and IOS.

# Install
```sh
composer require albo-vieira/push-notification dev-dev 
```

# Usage

Copy the file push_config and require it in your project, set the options as you need.
```php
include('push_config.php');
```

ANDROID
```php
$result = $android = PushNotification\PushFactory::getInstance('android', $pushConfig)
    ->withTokens([
        'TOKENS',
    ])
    ->withNotification(['title' => 'title', 'text' => 'Texto'])
    ->send();
print_r($result);  
```


IOS
```php
$result = $ios = PushNotification\PushFactory::getInstance('ios', $pushConfig)
    ->withTokens(['TOKENS'])
    ->withNotification(['alert' => 'Texto', 'badge' => 1, 'sound' => 'default'])
    ->send();
print_r($result);
```
    
