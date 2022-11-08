<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%activity_material}}".
 *
 * @property int $id
 * @property int $activity_material_id
 * @property string $activity_material_name
 * @property float $material_budget
 * @property string $activity_name
 * @property int $acticity_start_date
 * @property int $activity_end_date
 * @property string $items_quantity
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class ActivityMaterial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%activity_material}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['activity_material_id', 'activity_material_name', 'material_budget', 'activity_name', 'acticity_start_date', 'activity_end_date', 'items_quantity'], 'required'],
            [['activity_material_id', 'acticity_start_date', 'activity_end_date', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['material_budget'], 'number'],
            [['activity_material_name', 'activity_name', 'items_quantity'], 'string', 'max' => 255],
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
            'activity_material_id' => 'Activity Material ID',
            'activity_material_name' => 'Activity Material Name',
            'material_budget' => 'Material Budget',
            'activity_name' => 'Activity Name',
            'acticity_start_date' => 'Acticity Start Date',
            'activity_end_date' => 'Activity End Date',
            'items_quantity' => 'Items Quantity',
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
     * @return \common\models\query\ActivityMaterialQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ActivityMaterialQuery(get_called_class());
    }
}
