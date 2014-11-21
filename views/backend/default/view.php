<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use nill\blogs_category\Module;

/* @var $this yii\web\View */
/* @var $model app\models\BlogsCategory */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('blogs_category', 'Blogs Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogs-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('blogs_category', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('blogs_category', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('blogs_category', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_name',
            'category_description:ntext',
        ],
    ]) ?>

</div>
