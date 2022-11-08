<?php

use yii\db\Migration;
use common\models\project;
use common\models\project_material;
use common\models\task;
use common\models\activity;
use common\models\status;

/**
 * Handles the creation of table `{{%contract}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m221105_113000_create_contract_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contract}}', [
            'id' => $this->primaryKey(),
            'contract_id' => $this->integer(11)->notNull(),
            'contract_title' => $this->string(255)->notNull(),
            'project_name' => $this->string(255)->notnull()->foreignkey(project),
            'project_material' => $this->string(255)->notNull()->foreignkey(project_material),
            'task' => $this->string(255)->notNull()->foreignkey(task),
            'activity' => $this->string(255)->notNull()->foreignkey(activity),
            'project_budget' => $this->decimal(10,2)->notNull()->foreignkey(project),
            'status' => $this->string(255)->notNull()->foreignkey(status),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-contract-created_by}}',
            '{{%contract}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-contract-created_by}}',
            '{{%contract}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-contract-updated_by}}',
            '{{%contract}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-contract-updated_by}}',
            '{{%contract}}',
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
            '{{%fk-contract-created_by}}',
            '{{%contract}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-contract-created_by}}',
            '{{%contract}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-contract-updated_by}}',
            '{{%contract}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-contract-updated_by}}',
            '{{%contract}}'
        );

        $this->dropTable('{{%contract}}');
    }
}
