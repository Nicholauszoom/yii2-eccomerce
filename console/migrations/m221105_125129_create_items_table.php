<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%items}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m221105_125129_create_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%items}}', [
            'id' => $this->primaryKey(),
            'items_id' => $this->integer(11)->notNull(),
            'items_name' => $this->string(255)->notNull(),
            'material_budget' => $this->decimal(10,2)->notNull(),
            'items_quantity' => $this->string(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-items-created_by}}',
            '{{%items}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-items-created_by}}',
            '{{%items}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-items-updated_by}}',
            '{{%items}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-items-updated_by}}',
            '{{%items}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-items-created_by}}',
            '{{%items}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-items-created_by}}',
            '{{%items}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-items-updated_by}}',
            '{{%items}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-items-updated_by}}',
            '{{%items}}'
        );

        $this->dropTable('{{%items}}');
    }
}
