<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%items}}".
 *
 * @property int $id
 * @property int $items_id
 * @property string $items_name
 * @property float $material_budget
 * @property string $items_quantity
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%items}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['items_id', 'items_name', 'material_budget', 'items_quantity'], 'required'],
            [['items_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['material_budget'], 'number'],
            [['items_name', 'items_quantity'], 'string', 'max' => 255],
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
            'items_id' => 'Items ID',
            'items_name' => 'Items Name',
            'material_budget' => 'Material Budget',
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
     * @return \common\models\query\ItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ItemsQuery(get_called_class());
    }
}
