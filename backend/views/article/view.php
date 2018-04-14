<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//print_r($model);die();
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'author_id',
//            'category_id',
//            'content:ntext',
//            'create_time',
//            'update_time',
//            'status',
//            'categories_id',
//            'title',
            [
            'attribute' => 'id',
            'label' => '文章id',
            'contentOptions' => ['width' => '85%']
            ],
            [
            'attribute' => 'author_id',
            'label' => '作者',
            'value' => $model->author->name
            ],
            [
            'attribute' => 'title',
            'label' => '文章标题'
            ],
            [
            'attribute' => 'category_id',
            'label' => '分类',
            'value' => $model->category->cate_name
            ],
            [
            'attribute' => 'content',
            'label' => '文章内容'
            ],
            [
            'attribute' => 'create_time',
            'label' => '创建时间',
            'format' => ['date','php:Y-m-d H:i:s']
            ],
            [
            'attribute' => 'update_time',
            'label' => '修改时间',
            'format' => ['date','php:Y-m-d H:i:s']
            ],
            [
            'attribute' => 'status',
            'label' => '文章状态',
            'value' => $model->article_status->status_name
            ],
        ],
    ]) ?>

</div>
