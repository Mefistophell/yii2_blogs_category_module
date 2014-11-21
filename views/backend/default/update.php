<?php

use yii\helpers\Html;
use nill\blogs_category\Module;

/* @var $this yii\web\View */
/* @var $model app\models\BlogsCategory */

$this->title = Module::t('blogs_category', 'Update').': ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('blogs_category', 'Blogs Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('blogs_category', 'Update');
?>
<div class="blogs-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
