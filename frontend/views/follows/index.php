<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FollowsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '我的关注列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="followed-follows-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' =>
        [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
            'attribute' => 'author_id',
            'value' => 'author.name',
            'label' => '关注列表'
            ],
            [
            'attribute' => 'user_id',
            'value' => 'user.username',
            'label' => 'wo'
            ],
            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}',
            'buttons' =>
                [
                    'delete' => function ($url, $model, $key)
                    {
                        $options =
                            [
                            'title' => Yii::t('yii', '取关'),
                            'aria-label' => Yii::t('yii', '取关'),
                            'data-confirm' => Yii::t('yii', '你确定取消关注吗'),
                            'data-method' => 'post',
                            'data-pjax' => '0'
                            ];
                            return Html::a('<span class="glyphicon glyphicon-euro"></span>',$url,$options);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
