<?php

use yii\db\Migration;

/**
 * Handles the creation of table `settings`.
 */
class m221211_085911_create_setting_gorups_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'setting_gorups',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string()->notNull(),
                'key' => $this->string()->notNull(),
            ]
        );
        
        // creates index for column `key`
        $this->createIndex(
            'idx-setting-groups-key',
            'setting_gorups',
            'key'
        );
    }

    public function down()
    {
        $this->dropTable('setting_gorups');
        return true;
    }
}
