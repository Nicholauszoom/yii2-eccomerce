<?php

use yii\db\Migration;

use common\models\contract;

/**
 * Handles the creation of table `{{%document}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m221107_161457_create_document_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%document}}', [
            'id' => $this->primaryKey(),
            'document_id' => $this->integer(11)->notNull(),
            'document_name' => $this->string(255)->notNull(),
            'project_name' => $this->string(255)->notNull()->foreignkey(\common\models\Project::project),
            'contract_name' => $this->string(255)->notNull()->foreignkey(contract),
            'document_detail' => $this->string(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-document-created_by}}',
            '{{%document}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-document-created_by}}',
            '{{%document}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-document-updated_by}}',
            '{{%document}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-document-updated_by}}',
            '{{%document}}',
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
            '{{%fk-document-created_by}}',
            '{{%document}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-document-created_by}}',
            '{{%document}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-document-updated_by}}',
            '{{%document}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-document-updated_by}}',
            '{{%document}}'
        );

        $this->dropTable('{{%document}}');
    }
}
