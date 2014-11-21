<?php

use yii\helpers\Html;
use yii\grid\GridView;
use nill\blogs_category\Module;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BlogsCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('blogs_category', 'Blogs Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogs-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Module::t('blogs_category', 'Create category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_name',
            'category_description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
