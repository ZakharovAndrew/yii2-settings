<?php

namespace ZakharovAndrew\settings;

use Yii;

class Settings extends \yii\base\Component
{
    public function get($group_name, $key)
    {
        if (!$key || !$group_name) {
            return;
        }
        
        $settings = \ZakharovAndrew\settings\models\Settings::getGroupKeys();
        
        return $settings[$group_name][$key] ?? null;
    }
    
    public function clearCache()
    {
        return \ZakharovAndrew\settings\models\Settings::clearCache();
    }
    
}
