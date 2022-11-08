<?php

use yii\db\Migration;
use common\models\status;

/**
 * Handles the creation of table `{{%project}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m221102_152534_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer(11)->notNull(),
            'project_title' => $this->string(255)->notNull(),
            'company_name' => $this->string(255)->notnull(),
            'project_description' => $this->text(),
            'image' => $this->string(2000),
            'project_budget' => $this->decimal(10,2)->notNull(),
            'status' => $this->string(255)->notNull()->foreignkey(status),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-project-created_by}}',
            '{{%project}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-project-created_by}}',
            '{{%project}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-project-updated_by}}',
            '{{%project}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-project-updated_by}}',
            '{{%project}}',
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
            '{{%fk-project-created_by}}',
            '{{%project}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-project-created_by}}',
            '{{%project}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-project-updated_by}}',
            '{{%project}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-project-updated_by}}',
            '{{%project}}'
        );

        $this->dropTable('{{%project}}');
    }
}
