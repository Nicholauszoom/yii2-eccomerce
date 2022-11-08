<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%status}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m221107_161137_create_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%status}}', [
            'id' => $this->primaryKey(),
            'status_id' => $this->integer(11)->notNull(),
            'status_name' => $this->string(255)->notNull(),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-status-created_by}}',
            '{{%status}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-status-created_by}}',
            '{{%status}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-status-updated_by}}',
            '{{%status}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-status-updated_by}}',
            '{{%status}}',
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
            '{{%fk-status-created_by}}',
            '{{%status}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-status-created_by}}',
            '{{%status}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-status-updated_by}}',
            '{{%status}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-status-updated_by}}',
            '{{%status}}'
        );

        $this->dropTable('{{%status}}');
    }
}
