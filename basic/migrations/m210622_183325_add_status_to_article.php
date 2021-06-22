<?php

use yii\db\Migration;

/**
 * Class m210622_183325_add_status_to_article
 */
class m210622_183325_add_status_to_article extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('article', 'status',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('article','status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210622_183325_add_status_to_article cannot be reverted.\n";

        return false;
    }
    */
}
