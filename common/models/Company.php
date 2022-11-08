<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%company}}".
 *
 * @property int $company_id
 * @property string $company_address
 * @property string $company_city
 * @property string $company_type
 * @property string $company_name
 * @property string|null $company_description
 * @property string|null $image
 * @property float $price
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Company extends \yii\db\ActiveRecord
{

   /*
 * @var \yii\web\UploadedFile
 */


    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%company}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_address', 'company_city', 'company_type', 'company_name', 'price'/*,'image'*/], 'required'],
            [['company_description'], 'string'],
            [['price'], 'number'],
            [['imageFile'], 'image','extentions'=>'png,jpg,jpeg,webp','maxSize'=>10*1024*1024],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['company_address', 'company_city', 'company_type', 'company_name'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 2000],
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
            'company_id' => 'Company ID',
            'company_address' => 'Company Address',
            'company_city' => 'Company City',
            'company_type' => 'Company Type',
            'company_name' => 'Company Name',
            'company_description' => 'Company Description',
            /*'image' => 'Image',*/
            /*'imageFile' => 'Product Image',*/
            'price' => 'Price',
            'status' => 'Published',
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
     * @return \common\models\query\CompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CompanyQuery(get_called_class());
    }




}
