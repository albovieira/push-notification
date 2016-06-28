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

```sh
$ios = PushNotification\PushFactory::getInstance('ios')
    ->withTokens(['e0ba1fb9baf32dff805d30bdba786b8627182dc9aa0772082082ca05d168902d'])
    ->withNotification(['alert' => 'Texto', 'badge' => 1, 'sound' => 'default'])
    ->send();
```
    