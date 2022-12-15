<?php

use yii\db\Migration;

class m221212_085911_add_position_column_to_setting_groups_table extends Migration
{
    public function up()
    {
        $this->addColumn('setting_groups', 'position', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('setting_groups', 'position');
    }
}
