<?php

use yii\db\Migration;

/**
 * Class m210622_101242_add_date_to_comment
 */
class m210622_101242_add_date_to_comment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('comment', 'date', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('comment','date');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210622_101242_add_date_to_comment cannot be reverted.\n";

        return false;
    }
    */
}
