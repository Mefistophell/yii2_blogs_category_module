<?php

namespace nill\blogs_category\models;

use nill\blogs_category\Module;
use vova07\blogs\models\backend\Blog;
use Yii;

/**
 * This is the model class for table "yii2_start_blogs_category".
 *
 * @property integer $id
 * @property string $category_name
 * @property string $category_description
 */
class BlogsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii2_start_blogs_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name', 'category_description'], 'required'],
            [['category_description'], 'string'],
            [['category_name'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
            'category_description' => 'Category Description',
        ];
    }
    
    /*
    * Method for get name of Blogs Category
    * @return array value name Category
    */
    public static function getCategory()
    {
        return $customers = self::find()
            ->joinWith('category_id')
            ->where('category_id')
            ->distinct(true)
            ->asArray()
            ->all();
        
        /*
        * if need get only Category Name used: 
        * @return array value category_name
            
        foreach ($customers as $key=>$value) {
            $category_name[$value['id']]=$value['category_name'];
        }
        return $category_name;
        */
    }
    public function getCategory_id()
    {
        return $this->hasOne(Blog::className(), ['category_id' => 'id']);
    }
}
