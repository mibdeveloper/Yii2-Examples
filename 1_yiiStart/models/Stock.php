<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Stock".
 *
 * @property integer $id
 * @property integer $productid
 * @property integer $quantity
 *
 * @property Product $product
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productid', 'quantity'], 'required'],
            [['productid', 'quantity'], 'integer']
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
            'quantity' => 'Quantity',
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
