<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%activity}}".
 *
 * @property int $id
 * @property int $activity_id
 * @property string $activity_name
 * @property float $activity_material_budget
 * @property string $contract_name
 * @property string $project_name
 * @property string $task_name
 * @property int $acticity_start_date
 * @property int $activity_end_date
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%activity}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['activity_id', 'activity_name', 'activity_material_budget', 'contract_name', 'project_name', 'task_name', 'acticity_start_date', 'activity_end_date'], 'required'],
            [['activity_id', 'acticity_start_date', 'activity_end_date', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['activity_material_budget'], 'number'],
            [['activity_name', 'contract_name', 'project_name', 'task_name'], 'string', 'max' => 255],
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
            'activity_id' => 'Activity ID',
            'activity_name' => 'Activity Name',
            'activity_material_budget' => 'Activity Material Budget',
            'contract_name' => 'Contract Name',
            'project_name' => 'Project Name',
            'task_name' => 'Task Name',
            'acticity_start_date' => 'Acticity Start Date',
            'activity_end_date' => 'Activity End Date',
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
     * @return \common\models\query\ActivityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ActivityQuery(get_called_class());
    }
}
