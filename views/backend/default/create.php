<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BlogsCategory */

$this->title = 'Create Blogs Category';
$this->params['breadcrumbs'][] = ['label' => 'Blogs Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogs-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
