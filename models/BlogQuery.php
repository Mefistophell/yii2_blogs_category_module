<?php

namespace nill\blogs_category\models;

use vova07\users\traits\ModuleTrait;
use yii\db\ActiveQuery;
use nill\blogs_category\models\frontend\Blog;

/**
 * Class BlogQuery
 * @package vova07\blog\models
 */
class BlogQuery extends ActiveQuery
{

    use ModuleTrait;

    /**
     * Select published posts.
     *
     * @return $this
     */
    public function published()
    {
        $this->andWhere(['status_id' => Blog::STATUS_PUBLISHED]);

        return $this;
    }

    /**
     * Select unpublished posts.
     *
     * @return $this
     */
    public function unpublished()
    {
        $this->andWhere(['status_id' => Blog::STATUS_UNPUBLISHED]);

        return $this;
    }

    /**
     * Filter of posts by categories.
     *
     * @return $this
     */
    public function filterCategory($category)
    {
        $this->leftJoin('{{%blogs_to_category}} bg', [
            'id' => new \yii\db\Expression('blog_id'),
        ]);
        $this->andFilterWhere(['bg.category_id' => $category]);

        return $this;
    }
}
