<?php 
namespace nill\blogs_category\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use nill\blogs_category\models\BlogsCategory as Category;
use nill\blogs_category\Asset;

/*
* This widget is used to insert the slider 
* in the view page
*/  
class Widgetcategory extends Widget
{
    public $category;

    public function init()
    {
        $this->category=Category::getCategory();
        $this->registerClientScript();
    }

    public function run()
    {
        return $this->render('category',[
            'category'=>$this->category,
        ]);
    }
    
    protected function registerClientScript()
    {
        $view = $this->getView();
        Asset::register($view);
        
    }
}