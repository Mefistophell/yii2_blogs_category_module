<?php

namespace nill\blogs_category\models\frontend;

use nill\blogs_category\models\BlogsCategory as Category;

use nill\blogs_category\models\BlogQuery;

class Blog extends \vova07\blogs\models\frontend\Blog
{

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return new BlogQuery(get_called_class());
    }
}
