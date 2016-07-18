<?php

namespace nill\blogs_category\controllers\frontend;

use nill\blogs_category\Module;
use nill\blogs_category\models\frontend\Blog;
use yii\data\ActiveDataProvider;

/**
 * DefaultController implements the CRUD actions for BlogsCategory model.
 */
class BlogController extends \vova07\blogs\controllers\frontend\DefaultController
{

    public $module;

    public function __construct($id, $module, Module $mod, $config = [])
    {
        $this->module = new $mod;
        parent::__construct($id, $module, $config);
    }

    public function init()
    {
        parent::init();
        return $this->setViewPath('@vova07/blogs/views/frontend/default');
    }

    public function actionIndex($category = '')
    {

        $query = Blog::find()->published()->filterCategory($category);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $this->module->recordsPerPage
            ]
        ]);
        
        $this->setViewPath('@nill/blogs_category/views/frontend/blog');

        return $this->render('index', [
                'dataProvider' => $dataProvider
        ]);
    }
}
