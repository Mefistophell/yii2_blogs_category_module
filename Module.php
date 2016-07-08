<?php

namespace nill\blogs_category;

class Module extends \vova07\blogs\Module
{
    
    public static $name = 'blogs_category';
    public static $author = 'nill';

    public function __construct($id = 'blogs_category', $parent = null, $config = array())
    {
        
        if (!isset($config['viewPath'])) {
            if ($this->isBackend === true) {
                $config['viewPath'] = '@nill/blogs_category/views/backend';
            } else {
                $config['viewPath'] = '@nill/blogs_category/views/frontend';
            }
        }
        parent::__construct($id, $parent, $config);
    }


    /**
     * @var string Image path
     */
    public $imagePath = '@statics/web/blogs_category/images/';

    /**
     * @var string Images temporary path
     */
    public $imagesTempPath = '@statics/temp/blogs_category/images/';

    /**
     * @var string Image URL
     */
    public $imageUrl = '/statics/blogs_category/images';
}
