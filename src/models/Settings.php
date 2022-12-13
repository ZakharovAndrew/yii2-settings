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
    const CACHE_TIME = 3600;
    
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
            [['title', 'setting_group_id', 'key'], 'required'],
            [['setting_group_id'], 'integer'],
            [['value', 'type'], 'string'],
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
	
    /**
     * Group settings by group ID.
     */
    public static function groupByGroup()
    {
        $settings = self::find()->orderBy('id')->all();
        $result = [];
        foreach ($settings as $setting) {
            $result[$setting->setting_group_id][] = $setting;
        }
        
        return $result;
    }
    
    /**
     * Group settings by group ID with keys.
     */
    public static function getGroupKeys()
    {
        return Yii::$app->cache->getOrSet('settings_group_keys', function () {
            $settings = self::find()->orderBy('id')->all();
            $result = [];
            foreach ($settings as $setting) {
                $result[$setting->setting_group_id][$setting->key] = $setting->value;
            }
            return $result;
        }, self::CACHE_TIME);
    }
    
    public static function clearCache()
    {
        Yii::$app->cache->delete('settings_group_keys');
    }
    
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        static::clearCache();
    }

    /**
     * Delete setting and clear cache
     */
    public function afterDelete() {
        parent::afterDelete();
        static::clearCache();
    }

    
}
