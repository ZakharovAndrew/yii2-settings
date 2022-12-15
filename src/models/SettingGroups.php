<?php

namespace ZakharovAndrew\settings\models;

use Yii;
use ZakharovAndrew\settings\Module;

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
}
