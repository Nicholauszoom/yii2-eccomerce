<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%project_material}}".
 *
 * @property int $id
 * @property int $material_id
 * @property string $material_name
 * @property string $project_name
 * @property string $items
 * @property string $contract_title
 * @property string $activity_material
 * @property float $material_budget
 * @property string $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class ProjectMaterial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%project_material}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['material_id', 'material_name', 'project_name', 'items', 'contract_title', 'activity_material', 'material_budget', 'status'], 'required'],
            [['material_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['material_budget'], 'number'],
            [['material_name', 'project_name', 'items', 'contract_title', 'activity_material', 'status'], 'string', 'max' => 255],
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
            'material_id' => 'Material ID',
            'material_name' => 'Material Name',
            'project_name' => 'Project Name',
            'items' => 'Items',
            'contract_title' => 'Contract Title',
            'activity_material' => 'Activity Material',
            'material_budget' => 'Material Budget',
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
     * @return \common\models\query\ProjectMaterialQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProjectMaterialQuery(get_called_class());
    }
}
