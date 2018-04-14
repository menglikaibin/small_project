<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Author */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '作者', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-view">

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
            [
            'attribute' => 'id',
            ],
            [
            'attribute' => 'name',
            'value' => $author['name']
            ],
            'sex',
            'age',
            'email:email',
            'origin',
            'info:ntext',
//            'password',
//            'password_hash',
        ],
    ]) ?>

</div>
