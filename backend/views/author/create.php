<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\Author */

$this->title = '新增作者';
$this->params['breadcrumbs'][] = ['label' => '作者', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="author-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sex')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'age')->textInput() ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'origin')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'info')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('新增', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
