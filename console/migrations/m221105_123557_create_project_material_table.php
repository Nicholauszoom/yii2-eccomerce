<?php

use yii\db\Migration;
use common\models\project;
use common\models\items;
use common\models\task;
use common\models\contract;
use common\models\activity;
use common\models\status;

/**
 * Handles the creation of table `{{%project_material}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m221105_123557_create_project_material_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project_material}}', [
            'id' => $this->primaryKey(),
            'material_id' => $this->integer(11)->notNull(),
            'material_name' => $this->string(255)->notNull(),
            'project_name' => $this->string(255)->notnull()->foreignkey(project),
            'items' => $this->string(255)->notNull()->foreignkey(items),
            'contract_title' => $this->string(255)->notNull()->foreignkey(contract),
            'activity_material' => $this->string(255)->notNull()->foreignkey(activity_material),
            'material_budget' => $this->decimal(10,2)->notNull()->foreignkey(items),
            'status' => $this->string(255)->notNull()->foreignkey(status),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-project_material-created_by}}',
            '{{%project_material}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-project_material-created_by}}',
            '{{%project_material}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-project_material-updated_by}}',
            '{{%project_material}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-project_material-updated_by}}',
            '{{%project_material}}',
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
            '{{%fk-project_material-created_by}}',
            '{{%project_material}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-project_material-created_by}}',
            '{{%project_material}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-project_material-updated_by}}',
            '{{%project_material}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-project_material-updated_by}}',
            '{{%project_material}}'
        );

        $this->dropTable('{{%project_material}}');
    }
}
