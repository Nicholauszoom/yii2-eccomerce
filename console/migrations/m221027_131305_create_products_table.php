<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m221027_131305_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text()(),
            'image' => $this->string(2000),
            'price' => $this->decimal(10,2)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
