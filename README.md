Yii2-Start module Blogs-Category
========================
Blogs-Category module for Yii2-Start application.

This Module allows creating categories for the Blog.

There is also a widget that allows you to filter the blog posts by categories for the frontend. 

About
-----
**Version:** 0.9.1

**Authors:** Mefistophell Nill

TODO
----

```
public function setCategory()
{
    $post = Yii::$app->request->post('Blog');
    if (!$this->isNewRecord) {
        Yii::$app->db->createCommand()->update('{{%blogs_to_category}}', ['category_id' => $post['category'], 'blog_id' => $this->id], ['blog_id' => $this->id])->execute();
        return true;
    } 
}
```

The temporary decision. I shall be grateful for improvement.

```
public function afterSave($insert, $changedAttributes)
{
    parent::afterSave($insert, $changedAttributes);

    if (!$this->category) {
        $post = Yii::$app->request->post('Blog');
        Yii::$app->db->createCommand()->insert('{{%blogs_to_category}}', ['category_id' => $post['category'], 'blog_id' => $this->id], ['blog_id' => $this->id])->execute();
        return true;
    }
}
```

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
'blogs_category' => [
    'isBackend' => true
],
```
- Add module to [frontend] config section:

```
'blogs_category' => [
    'controllerNamespace' => 'nill\blogs_category\controllers\frontend'
],
```

- Add module to [common] config section:

```
'blogs_category' => [
    'class' => 'nill\blogs_category\Module'
],
```

- Add alias to "common\config\aliases.php":

```
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
```

- Add the module to extensions in the top of the file "vendor\yiisoft\extensions.php":

```
'nill/blogs_category' =>
    array(
        'name' => 'nill/yii2-blogs-category-module',
        'version' => '0.1.0.0',
        'alias' =>
        array(
            '@nill/blogs_category' => $vendorDir . '/nill/yii2-blogs-category-module',
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
