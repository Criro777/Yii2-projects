<?php

use yii\db\Migration;

class m170326_133032_add_user_id_to_article extends Migration
{
    public function up()
    {
        $this->addColumn('article','user_id',$this->integer());
    }

    public function down()
    {

        $this->dropColumn('article','user_id');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
