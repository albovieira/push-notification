# push-notification
doing

# Install
```sh
composer require albo-vieira/push-notification && install 
```

# Usage
```sh
$android = \albov\App\PushFactory::getInstance('android');
$android
    ->withToken('YOUR TOKEN')
    ->withNotificationContent('Titulo', 'texto')
    ->push();

```
