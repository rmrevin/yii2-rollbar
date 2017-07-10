Yii 2 Rollbar error handler
===============================
[![License](https://poser.pugx.org/rmrevin/yii2-rollbar/license.svg)](https://packagist.org/packages/rmrevin/yii2-rollbar)
[![Latest Stable Version](https://poser.pugx.org/rmrevin/yii2-rollbar/v/stable.svg)](https://packagist.org/packages/rmrevin/yii2-rollbar)
[![Latest Unstable Version](https://poser.pugx.org/rmrevin/yii2-rollbar/v/unstable.svg)](https://packagist.org/packages/rmrevin/yii2-rollbar)
[![Total Downloads](https://poser.pugx.org/rmrevin/yii2-rollbar/downloads.svg)](https://packagist.org/packages/rmrevin/yii2-rollbar)

Installation
------------
```bash
composer require "rmrevin/yii2-rollbar:~1.5"
```

Usage
-----
In `main` config:
```php
<?php

return [
    // ...
    'bootstrap' => [
        // ...
        'rollbar',
    ],
    'components' => [
        // ...
        'rollbar' => [
            'class' => 'rmrevin\yii\rollbar\Component',
            'accessToken' => 'YOU ACCESS TOKEN',
            'environment' => 'production',
            // ... more options see in code
        ],
    ],
    // ...
];
```

In `main` config of `web` application:
```php
<?php
return [
    // ...
    'components' => [
        // ...
        'errorHandler' => [
            'class' => 'rmrevin\yii\rollbar\web\ErrorHandler',
        ],
    ],
    // ...
];
```

In `main` config of `console` application:
```php
<?php
return [
    // ...
    'components' => [
        // ...
        'errorHandler' => [
            'class' => 'rmrevin\yii\rollbar\console\ErrorHandler',
        ],
    ],
    // ...
];
```
