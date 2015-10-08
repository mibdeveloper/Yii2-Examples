<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ProductPicture".
 *
 * @property integer $id
 * @property integer $productid
 * @property string $name
 *
 * @property Product $product
 */
class ProductPicture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ProductPicture';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productid', 'name'], 'required'],
            [['productid'], 'integer'],
            [['name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'productid' => 'Productid',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'productid']);
    }
}
