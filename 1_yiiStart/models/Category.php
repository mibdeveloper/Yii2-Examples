<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\base\Object;

/**
 * This is the model class for table "Category".
 *
 * @property integer $id
 * @property integer $parentid
 * @property string $title
 * @property string $description
 *
 * @property Category $parent
 * @property Category[] $categories
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentid'], 'integer'],
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parentid' => 'Parentid',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parentid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['parentid' => 'id']);
    }

    public function getParentCategies()
    {
        return ArrayHelper::map(Category::find()->all(),"id","title" );
    }

    public static function getList()
    {
        $data = static::find()
            ->select(['id', 'parentid', 'title'])
            ->orderBy('parentid ASC')
            ->asArray()
            ->all();

        $sort = new SortList([
                'data' => $data,
                'prefix' => '------',
        ]);
        $sortList = ArrayHelper::map($sort->getList(), 'id', 'title');
        return $sortList;
    }
}


class SortList extends Object
{
    public $data;

    public $prefix = '   ';

    protected function getPath($category_id, $prefix = false)
    {
        foreach ($this->data as $item) {
            if ($category_id == $item['id']) {
                $prefix = $prefix ? $this->prefix . $prefix : $item['title'];
                if ($item['parent_id']) {
                    return $this->getPath($item['parent_id'], $prefix);
                } else {
                    return $prefix;
                }
            }
        }
        return '';
    }

    public function getList($parent_id = 0)
    {
        $data = [];

        foreach ($this->data as $item) {
            if ($parent_id == $item['parent_id']) {
                $data[] = [
                    'id' => $item['id'],
                    'title' => $this->getPath($item['id'])
                ];
                $data = array_merge($data, $this->getList($item['id']));
            }
        }

        return $data;
    }
}
