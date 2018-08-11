<?php

use yii\db\Migration;

/**
 * Class m180809_141538_currencies
 */
class m180809_141538_currencies extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('currency', [
            'id' => $this->primaryKey(),
            'rates' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180809_141538_currencies cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180809_141538_currencies cannot be reverted.\n";

        return false;
    }
    */
}
