<?php

use yii\db\Migration;

/**
 * Handles the creation of table `settings`.
 */
class m221204_085911_create_settings_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'settings',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string()->notNull(),
                'description' => $this->string(),
                'type' => $this->string()->notNull(),
                'setting_group_id' => $this->integer()->notNull(),
                'key' => $this->string()->notNull()->unique(),
                'value' => $this->text(),
            ]
        );
        
        // creates index for column `key`
        $this->createIndex(
            'idx-settings-key',
            'settings',
            'key'
        );
    }

    public function down()
    {
        $this->dropTable('settings');
        return true;
    }
}
