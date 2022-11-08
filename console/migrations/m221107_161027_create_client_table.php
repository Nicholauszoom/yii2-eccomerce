<?php

use yii\db\Migration;
use common\models\project;
use common\models\status;

/**
 * Handles the creation of table `{{%client}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m221107_161027_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer(11)->notNull(),
            'client_name' => $this->string(255)->notNull(),
            'project_name' => $this->string(255)->notNull()->foreignkey(project),
            'status_name' => $this->string(255)->notNull()->foreignkey(status),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-client-created_by}}',
            '{{%client}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-client-created_by}}',
            '{{%client}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-client-updated_by}}',
            '{{%client}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-client-updated_by}}',
            '{{%client}}',
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
            '{{%fk-client-created_by}}',
            '{{%client}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-client-created_by}}',
            '{{%client}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-client-updated_by}}',
            '{{%client}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-client-updated_by}}',
            '{{%client}}'
        );

        $this->dropTable('{{%client}}');
    }
}
