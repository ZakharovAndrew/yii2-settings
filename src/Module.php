<?php

/**
 * @link https://github.com/ZakharovAndrew/yii2-settings/
 * @copyright Copyright (c) 2022 Zakharov Andrew
 */
 
namespace ZakharovAndrew\settings;

/**
 * Class Module 
 */
class Module extends \yii\base\Module
{
    /**
     * Url prefix for module actions.
     *
     * @var string
     */
    public $urlPrefix = 'admin';
    
    public $bootstrapVersion = '';
    
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'ZakharovAndrew\settings\controllers';

    /**
     * {@inheritdoc}
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();
    }
    
}