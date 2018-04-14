<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AritcleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章详情';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建文章', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            [
//            'class' => 'yii\grid\SerialColumn',
//            'header' => '操作',
//            'headerOptions' => ['width' => '120'],
//            'template' => '{view}{update}{delete}{forbid}'
//            ],

//            'id',
            [
            'attribute' => 'id',
            'contentOptions' => ['width' => '40px'],
            'label' => '文章'
            ],
            [
            'attribute' => 'title',
            'contentOptions' => ['width' => '100px'],
            'label' => '标题'
            ],
            [
            'attribute' => 'authorName',
            'value' => 'author.name',
            'label' => '作者'
            ],
//            'author_id',
            [
            'attribute' => 'cateName',
            'value' => 'category.cate_name',
            'label' => '类别'
            ],
            [
            'attribute' => 'statusName',
            'value' => 'article_status.status_name',
            'label' => '文章状态',
            'contentOptions' => ['width' => '100px'],
            'filter' => \backend\models\ArticleStatus::find()
                ->select(['status_name','id'])
                ->indexBy('status_name')
                ->column()
            ],
//            'content:ntext',
            [
            'attribute' => 'create_time',
            'format' => ['date','php:Y-m-d H:i:s'],
            'label' => '创建时间'
            ],
            // 'update_time',
            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete} {forbid} ',
                'buttons'=>
                [
                'forbid'=>function($url,$model)
                    {
                        return Html::a('<i class="glyphicon glyphicon-remove-circle"></i>',['user/forbid','id'=>$model->id]);
                    }
                ],
            ],
        ],
    ]); ?>
</div>
