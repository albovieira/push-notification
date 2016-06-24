# push-notification
Send push-notifications for Android(with GCM) and IOS.

# Install
```sh
composer require albo-vieira/push-notification:dev-master && install 
```

# Usage
```sh
$android = PushNotification\PushFactory::getInstance('android');
$android
    ->withTokens([
    'TOKEN',
    ])
    ->withNotification(['title' => 'title', 'text' => 'Texto'])
    ->send();
```
