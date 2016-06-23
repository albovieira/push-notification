# push-notification
doing

# Install
Add albo-vieira/push-notification:dev in your composer.json

# Usage
```sh
$android = \albov\App\PushFactory::getInstance('android');
$android
    ->withToken('YOUR TOKEN')
    ->withNotificationContent('Titulo', 'texto')
    ->push();

```
