<?php

use yii\db\Migration;
use common\models\project;
use common\models\activity_material;
use common\models\task;
use common\models\contract;


/**
 * Handles the creation of table `{{%activity}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m221107_153927_create_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%activity}}', [
            'id' => $this->primaryKey(),
            'activity_id' => $this->integer(11)->notNull(),
            'activity_name' => $this->string(255)->notNull(),
            'activity_material_budget' => $this->decimal(10,2)->notNull()->foreignkey(activity_material),
            'contract_name' => $this->string(255)->notNull()->foreignkey(contract),
            'project_name' => $this->string(255)->notNull()->foreignkey(project),
            'task_name' => $this->string(255)->notNull()->foreignkey(task),
            'acticity_start_date' => $this->integer(225)->notNull(),
            'activity_end_date' => $this->integer(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-activity-created_by}}',
            '{{%activity}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-activity-created_by}}',
            '{{%activity}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-activity-updated_by}}',
            '{{%activity}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-activity-updated_by}}',
            '{{%activity}}',
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
            '{{%fk-activity-created_by}}',
            '{{%activity}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-activity-created_by}}',
            '{{%activity}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-activity-updated_by}}',
            '{{%activity}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-activity-updated_by}}',
            '{{%activity}}'
        );

        $this->dropTable('{{%activity}}');
    }
}
