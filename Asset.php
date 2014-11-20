<?php

namespace nill\blogs_category;

use yii\web\AssetBundle;

/**
 * Module asset bundle.
 */
class Asset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@nill/blogs_category/assets';

    /**
     * @inheritdoc
     */
    public $css = [
        'css/category.css'
    ];
}
