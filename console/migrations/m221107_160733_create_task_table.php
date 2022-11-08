<?php

use yii\db\Migration;
use common\models\project;
use common\models\contract;
use common\models\team;
use common\models\activity;
use common\models\status;

/**
 * Handles the creation of table `{{%task}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m221107_160733_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer(11)->notNull(),
            'task_name' => $this->string(255)->notNull(),
            'project_name' => $this->string(255)->notNull()->foreignkey(project),
            'contract_name' => $this->string(255)->notNull()->foreignkey(contract),
            'activity_name' => $this->string(255)->notNull()->foreignkey(activity),
            'team_name' => $this->string(255)->notNull()->foreignkey(team),
            'status_name' => $this->string(255)->notNull()->foreignkey(status),
            'start_date' => $this->integer(11)->notNull(),
            'end_date' => $this->integer(11)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-task-created_by}}',
            '{{%task}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-task-created_by}}',
            '{{%task}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-task-updated_by}}',
            '{{%task}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-task-updated_by}}',
            '{{%task}}',
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
            '{{%fk-task-created_by}}',
            '{{%task}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-task-created_by}}',
            '{{%task}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-task-updated_by}}',
            '{{%task}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-task-updated_by}}',
            '{{%task}}'
        );

        $this->dropTable('{{%task}}');
    }
}
