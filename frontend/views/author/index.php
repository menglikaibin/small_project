<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AuhorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '作者列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'id'],
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
                'template' => '{follow}{view}',
                'buttons' =>
                    [
                        'follow' => function ($url, $model, $key) use ($author_id)
                        {
                            $options =
                                [
                                    'title' => Yii::t('yii', '关注'),
                                    'aria-label' => Yii::t('yii','关注'),
                                    'data-method' => 'post',
                                    'data-pjax' => '0'
                                ];
                            return Html::a(in_array($model->id,$author_id)?
                                '<span class="glyphicon glyphicon-star" title="取关"></span>':
                                '<span class="glyphicon glyphicon-star-empty" title="关注"></span>',
                                in_array($model->id,$author_id)?
                                    ['author/unfollow','id'=>$model->id]:
                                    ['author/follow','id'=>$model->id], $options);
                        }
                    ]
            ],
        ],
    ]); ?>
</div>
