<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '作者列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增作者', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'sex',
            'age',
            'email:email',
            // 'origin',
            // 'info:ntext',
            // 'password',
            // 'password_hash',

            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{follow}',
            'buttons' =>
                [
                    'follow' => function ($url, $model, $key)
                    {
                        $options =
                            [
                            'title' => Yii::t('yii', '审核'),
                            'aria-label' => Yii::t('yii','审核'),
                            'data-method' => 'post',
                            'data-pjax' => '0'
                            ];
                        return Html::a('<span class="glyphicon glyphicon-care"></span>',$url,$options);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
