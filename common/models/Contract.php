<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%contract}}".
 *
 * @property int $id
 * @property int $contract_id
 * @property string $contract_title
 * @property string $project_name
 * @property string $project_material
 * @property string $task
 * @property string $activity
 * @property float $project_budget
 * @property string $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Contract extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%contract}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contract_id', 'contract_title', 'project_name', 'project_material', 'task', 'activity', 'project_budget', 'status'], 'required'],
            [['contract_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['project_budget'], 'number'],
            [['contract_title', 'project_name', 'project_material', 'task', 'activity', 'status'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contract_id' => 'Contract ID',
            'contract_title' => 'Contract Title',
            'project_name' => 'Project Name',
            'project_material' => 'Project Material',
            'task' => 'Task',
            'activity' => 'Activity',
            'project_budget' => 'Project Budget',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ContractQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ContractQuery(get_called_class());
    }
}
