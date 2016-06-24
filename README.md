# push-notification
Send push-notifications for Android(with GCM) and IOS.

# Install
```sh
composer require albo-vieira/push-notification:dev-master && install 
```

# Usage
```sh
$android = \albov\App\PushFactory::getInstance('android');
$android
    ->withToken('YOUR TOKEN')
     ->withNotificationContent(['title' => 'title', 'text' => 'Texto'])
    ->send();

```
