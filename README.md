# push-notification
Send push-notifications for Android(with GCM) and IOS.

# Install
```sh
composer require albo-vieira/push-notification:dev-master && install 
```

# Usage
```sh
$android = PushNotification\PushFactory::getInstance('android')
    ->withTokens(['TOKEN'])
    ->withNotification(['title' => 'title', 'text' => 'Texto'])
    ->send();
```

```sh
$ios = PushNotification\PushFactory::getInstance('ios')
    ->withTokens(['TOKEN'])
    ->withNotification(['alert' => 'Texto', 'badge' => 1, 'sound' => 'default'])
    ->send();
```
    
