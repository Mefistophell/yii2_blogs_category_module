Yii2-Start module Blogs-Category
========================
Blogs-Category module for Yii2-Start application.

This Module allows creating categories for the Blog.

There is also a widget that allows you to filter the blog posts by categories for the frontend. 

Requirements
------------

This module is used with Yii2-Start application
[yii2-start](https://github.com/vova07/yii2-start).


Installation
=============

Install via Composer
--------------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require nill/yii2-blogs-category-module "dev-master"
```

or add

```
"nill/yii2_blogs_category_module": "dev-master"
```

to the require section of your `composer.json` file.

Install from an Archive File
----------------------------

Download and extract the zip-file into the folder with your project


```
/my/path/to/yii2-start/vendor/nill/yii2_blogs_category_module
```

Configuration
=============

- Add module to [backend] config section:

```
'modules' => [
    'blogs_category' => [
        'class' => 'nill\blogs_category\Module'
    ]
]
```

- Add alias to "common\config\aliases.php":

```
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
```

- Add module to extensions "vendor\yiisoft\extensions.php":

```
'nill/slider' => 
    array (
        'name' => 'nill/yii2_blogs_category_module',
        'version' => '0.1.0.0',
        'alias' => 
        array (
            '@nill/blogs_category' => $vendorDir . '/nill/yii2_blogs_category_module',
    ),
    'bootstrap' => 'nill\\blogs_category\\Bootstrap',
), 
```

- Create a new table in your database from file: `yii2_start_blogs_category.sql`
- Add in table `yii2_start_blogs` column: name: `category_id`	type: `int(11)`. This can be done by running the query SQL: 
```
ALTER TABLE yii2_start_blogs ADD category_id INT(11) NOT NULL; 
```

OR: Apply migration with console commands:

`php yii migrate --migrationPath=@nill/blogs_category/migrations`

- Add in Blog Model:

`vendor\vova07\yii2-start-blogs-module\models\backend\Blog.php`

this code:
```
use nill\blogs_category\models\BlogsCategory as Category;

public function getCategory()
{
    return $this->hasOne(Category::className(), ['id' => 'category_id']);
}
```

- Change actionIndex in Controller: 

`vendor\vova07\yii2-start-blogs-module\controllers\frontend\DefaultController.php`


```
function actionIndex($category='')
{
    $query=Blog::find()->published();
    $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination' => [
            'pageSize' => $this->module->recordsPerPage
        ]
    ]);
    
    $query->andFilterWhere(['like', 'category_id', $category]);
```

- Add in _form:

`vendor\vova07\yii2-start-blogs-module\views\backend\default\_form.php`

this code:
```
use nill\blogs_category\models\BlogsCategory as Category;
use yii\helpers\ArrayHelper;


$form->field($model, 'category_id')->dropDownList(ArrayHelper::map(
Category::find()->asArray()->all(), 'id', 'category_name'),
['prompt'=>'Select category']);

```

- Add widget on your page. For example:

IN: 
`vendor\vova07\yii2-start-blogs-module\views\frontend\default\index.php`

add this code:
```
use nill\blogs_category\widgets\WidgetCategory;
WidgetCategory::widget();
```

Backend
----------------------------
For work of the module in the backend follows add it to the menu:
`vendor\vova07\yii2-start-themes\admin\views\layouts\sidebar-menu.php`

```
[
    'label' => 'Blogs Category'),
    'url' => ['/blogs_category/default/index'],
    'icon' => 'fa-folder-open',
    'visible' => Yii::$app->user->can('administrateBlogs') || Yii::$app->user->can('BViewBlogs'),
],
```
