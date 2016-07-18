<?php

namespace nill\blogs_category\models\backend;

use nill\blogs_category\models\BlogsCategory as Category;
use Yii;

class Blog extends \vova07\blogs\models\backend\Blog
{

    public function scenarios()
    {
        $scenarios = parent::scenarios();

        $scenarios['admin-create'][] = array_push($scenarios['admin-create'], 'category');
        $scenarios['admin-update'][] = array_push($scenarios['admin-update'], 'category');

        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['category'], 'integer'];

        return $rules;
    }

//    public function getCategories()
//    {
//        $row = (new \yii\db\Query())
//            ->select(['category_id'])
//            ->from('{{%blogs_to_category}}')
//            ->where('blog_id=:blog_id')
//            ->addParams([':blog_id' => $this->id])
//            ->one();
//
//        return $row['category_id'];
//    }


    public function setCategory()
    {
        $post = Yii::$app->request->post('Blog');
        if (!$this->isNewRecord) {
            Yii::$app->db->createCommand()->update('{{%blogs_to_category}}', ['category_id' => $post['category'], 'blog_id' => $this->id], ['blog_id' => $this->id])->execute();
            return true;
        } 
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id'])
                ->viaTable('{{%blogs_to_category}}', ['blog_id' => 'id']);
    }
    
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        
        if (!$this->category) {
            $post = Yii::$app->request->post('Blog');
            Yii::$app->db->createCommand()->insert('{{%blogs_to_category}}', ['category_id' => $post['category'], 'blog_id' => $this->id], ['blog_id' => $this->id])->execute();
            return true;
        }
    }

}
