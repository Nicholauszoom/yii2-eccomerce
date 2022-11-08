<?php

use yii\db\Migration;


use common\models\team;

/**
 * Handles the creation of table `{{%staff}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m221107_154548_create_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%staff}}', [
            'id' => $this->primaryKey(),
            'staff_id' => $this->integer(11)->notNull(),
            'staff_name' => $this->string(255)->notNull(),
            'staff_salary' => $this->decimal(10,2)->notNull(),
            'team_name' => $this->string(255)->notNull()->foreignkey(team),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-staff-created_by}}',
            '{{%staff}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-staff-created_by}}',
            '{{%staff}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-staff-updated_by}}',
            '{{%staff}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-staff-updated_by}}',
            '{{%staff}}',
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
            '{{%fk-staff-created_by}}',
            '{{%staff}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-staff-created_by}}',
            '{{%staff}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-staff-updated_by}}',
            '{{%staff}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-staff-updated_by}}',
            '{{%staff}}'
        );

        $this->dropTable('{{%staff}}');
    }
}
