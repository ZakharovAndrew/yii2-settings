# Yii2 Settings

[![Latest Stable Version](https://poser.pugx.org/zakharov-andrew/yii2-settings/v/stable)](https://packagist.org/packages/zakharov-andrew/yii2-settings)
[![License](https://poser.pugx.org/zakharov-andrew/yii2-settings/license)](https://packagist.org/packages/zakharov-andrew/yii2-settings)
[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)

Yii2 settings with database module with GUI manager supported.

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

## Usage

There are 2 parts to this extension. A module and a component. The module provides a simple GUI to edit your settings. The component provides a way to retrieve and save settings programmatically.

Add this to your main configuration's modules array

```
    'modules' => [
        'settings' => [
            'class' => 'ZakharovAndrew\settings\Module',
            'bootstrapVersion' => 5, // if use bootstrap 5
        ],
        // ...
    ],
```

Add this to your main configuration's components array

```
    'components' => [
        'settings' => [
            'class' => 'ZakharovAndrew\settings\Settings',
        ],
    ],
```

Add a new rule for `urlManager` of your application's configuration file, for example:

```php
'urlManager' => [
    'rules' => [
        'settings' => 'settings/default/index',
        'settings/create' => 'settings/default/create',
        'settings/update' => 'settings/default/update',
        'settings/delete' => 'settings/default/delete',
        'setting-groups/create' => 'settings/setting-groups/create',
        'setting-groups/update' => 'settings/setting-groups/update',
        'setting-groups/delete' => 'settings/setting-groups/delete',
    ],
],
```


Typical component usage

```php
$settings = Yii::$app->settings;

$valueList = $settings->get('group1');

$value = $settings->get('group1', 'key');

$settings->set('group1', 'key', 'value');

// Automatically called on set();
$settings->clearCache();
```

## 👥 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

**yii2-settings** it is available under a BSD 3-Clause License. Detailed information can be found in the `LICENSE.md`.
