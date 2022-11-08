<?php

use yii\db\Migration;
use common\models\project;
use common\models\task;

/**
 * Handles the creation of table `{{%team}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m221107_155510_create_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%team}}', [
            'id' => $this->primaryKey(),
            'team_id' => $this->integer(11)->notNull(),
            'team_name' => $this->string(255)->notNull(),
            'project_name' => $this->string(255)->notNull()->foreignkey(project),
            'team_number' => $this->decimal(10,2)->notNull(),
            'task_name' => $this->string(255)->notNull()->foreignkey(task),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-team-created_by}}',
            '{{%team}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-team-created_by}}',
            '{{%team}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-team-updated_by}}',
            '{{%team}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-team-updated_by}}',
            '{{%team}}',
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
            '{{%fk-team-created_by}}',
            '{{%team}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-team-created_by}}',
            '{{%team}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-team-updated_by}}',
            '{{%team}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-team-updated_by}}',
            '{{%team}}'
        );

        $this->dropTable('{{%team}}');
    }
}
