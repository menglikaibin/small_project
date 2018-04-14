<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Author */

$this->title = '修改作者信息: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '作者列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '作者信息';
?>
<div class="author-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
