<?php

use yii\helpers\Html;
use nill\blogs_category\Module;

/* @var $this yii\web\View */
/* @var $model app\models\BlogsCategory */

$this->title = Module::t('blogs_category', 'Create category');
$this->params['breadcrumbs'][] = ['label' => Module::t('blogs_category', 'Blogs Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogs-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
