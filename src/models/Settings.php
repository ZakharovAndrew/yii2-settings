<?php

namespace ZakharovAndrew\settings\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property int $setting_groups_id
 * @property string $title
 * @property string $description
 * @property string $key
 * @property string $value
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

}
