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
        
        $settings = \ZakharovAndrew\settings\models\Setting::getGroupKeys();
        
        return $settings[$group_name][$key] ?? null;
    }
}
