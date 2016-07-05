<?php

namespace nill\blogs_category\models\backend;

use nill\blogs_category\models\BlogsCategory as Category;
use Yii;


class Blog extends \vova07\blogs\models\backend\Blog
{

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
