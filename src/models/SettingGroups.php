<?php

namespace ZakharovAndrew\settings\models;

use Yii;
use ZakharovAndrew\settings\Module;
use ZakharovAndrew\settings\models\Settings;

/**
 * This is the model class for table "setting_groups".
 *
 * @property int $id
 * @property string $title 
 * @property string $key 
 * @property int $pos
 */
class SettingGroups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'key'], 'required'],
            [['position',], 'integer'],
            [['title', 'key'], 'string', 'max' => 255],
            [['key'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Module::t('Title'),
            'key' => Module::t('Key'),
            'position' => Module::t('Position')
        ];
    }
    
    /**
     * Reset cache
     * @param type $insert
     * @param type $changedAttributes
     */
    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        Settings::clearCache();
    }
    
    /**
     * Delete setting group and clear cache
     */
    public function afterDelete() {
        parent::afterDelete();
        Settings::clearCache();
    }
}
