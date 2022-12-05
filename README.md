# Yii2 Settings
Yii2 Settings Module.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ composer require zakharov-andrew/yii2-settings
```
or add

```
"zakharov-andrew/yii2-settings": "*"
```

to the ```require``` section of your ```composer.json``` file.

Subsequently, run

```
./yii migrate/up --migrationPath=@vendor/zakharov-andrew/yii2-settings/migrations
```

in order to create the settings table in your database.


##  Config config/main.php to use Yii::$app->settings

```
    'components' => [
        'settings' => [
            'class' => 'ZakharovAndrew\settings\Settings',
        ],
    ],
```
