<?php

use yii\db\Migration;

/**
 * Class m210625_190810_add_users_role_field
 */
class m210625_190810_add_users_role_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('user', 'role', $this->integer()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('user', 'role');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210625_190810_add_users_role_field cannot be reverted.\n";

        return false;
    }
    */
}
