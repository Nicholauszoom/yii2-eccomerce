<?php

use yii\db\Migration;

use common\models\items;
use common\models\activity;


/**
 * Handles the creation of table `{{%activity_material}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m221105_125908_create_activity_material_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%activity_material}}', [
            'id' => $this->primaryKey(),
            'activity_material_id' => $this->integer(11)->notNull(),
            'activity_material_name' => $this->string(255)->notNull(),
            'material_budget' => $this->decimal(10,2)->notNull()->foreignkey(items),
            'activity_name' => $this->string(255)->notNull()->foreignkey(activity),
            'acticity_start_date' => $this->integer(225)->notNull(),
            'activity_end_date' => $this->integer(255)->notNull(),
            'items_quantity' => $this->string(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-activity_material-created_by}}',
            '{{%activity_material}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-activity_material-created_by}}',
            '{{%activity_material}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-activity_material-updated_by}}',
            '{{%activity_material}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-activity_material-updated_by}}',
            '{{%activity_material}}',
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
            '{{%fk-activity_material-created_by}}',
            '{{%activity_material}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-activity_material-created_by}}',
            '{{%activity_material}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-activity_material-updated_by}}',
            '{{%activity_material}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-activity_material-updated_by}}',
            '{{%activity_material}}'
        );

        $this->dropTable('{{%activity_material}}');
    }
}
