<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FollowedFollows */

$this->title = 'Create Followed Follows';
$this->params['breadcrumbs'][] = ['label' => 'Followed Follows', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="followed-follows-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
