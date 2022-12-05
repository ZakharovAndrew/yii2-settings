<?php

namespace ZakharovAndrew\settings\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $type
 * @property int $setting_group_id
 * @property string $key
 * @property string|null $value
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'type', 'setting_group_id', 'key'], 'required'],
            [['setting_group_id'], 'integer'],
            [['value'], 'string'],
            [['title', 'description', 'type', 'key'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'description' => 'Description',
            'type' => 'Type',
            'setting_group_id' => 'Setting Group ID',
            'key' => 'Key',
            'value' => 'Value',
        ];
    }
}
