#Laravel CORS

## Add CORS to your Laravel/Lumen app in 2 steps :

#### Require the package :
```
composer require abellion/laravel-cors
```

#### Add the service provider to your app :
```php
Abellion\Cors\LaravelServiceProvider::class
```

- **Laravel** : In the `providers` array of the ```config/app.php``` file
- **Lumen** : In the ```bootstrap/app.php``` file using the ```$app->register();``` method.

**You're all set ! All origins are allowed by default. If you want to config your own domains, see bellow.**

## Configuring allowed origins :

By default all origins are allowed. You can add your own config by modifying the ```ORIGINS``` array from the ```OriginsMiddleware``` class :

```php
use Abellion\Cors\Middleware\OriginsMiddleware;

OriginsMiddleware::$ORIGINS = [
    "/https:\/\/(www\.)?([a-z0-9]+\.)?mydomain\.(com|fr)/",
    "/http(s)?:\/\/(www\.)?localhost(:[0-9]+)?/"
];
```

All origins that match one of the regex will be added. In this example ```localhost``` and ```mydomain``` are allowed.

## Configuring other headers :

```php
use Abellion\Cors\Middleware\OptionsMiddleware;

OptionsMiddleware::$OPTIONS['Access-Control-Allow-Methods'] = "POST, PUT, DELETE, GET, OPTIONS, PATCH, HEAD";
```
