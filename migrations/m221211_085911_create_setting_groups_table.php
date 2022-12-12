<?php

use yii\db\Migration;

/**
 * Handles the creation of table `setting_groups`.
 */
class m221211_085911_create_setting_groups_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'setting_groups',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string()->notNull(),
                'key' => $this->string()->notNull(),
            ]
        );
        
        // creates index for column `key`
        $this->createIndex(
            'idx-setting-groups-key',
            'setting_groups',
            'key'
        );
    }

    public function down()
    {
        $this->dropTable('setting_groups');
        return true;
    }
}
