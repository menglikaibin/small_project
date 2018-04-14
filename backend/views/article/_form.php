<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'author_id')->textInput(['maxlength' => true])->label('作者'); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('标题') ?>

    <?= $form->field($model, 'category_id')
        ->dropDownList(\backend\models\Categories::find()
        ->select(['cate_name','id',])
        ->orderBy('id')
        ->indexBy('id')
        ->column(),
        ['prompt' => '请选择分类'])->label('分类')
    ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6])->label('内容') ?>

    <?= $form->field($model, 'create_time')->textInput(['maxlength' => true])->label('创建时间') ?>

    <?= $form->field($model, 'update_time')->textInput(['maxlength' => true])->label('修改时间') ?>

    <?= $form->field($model, 'status')
            ->dropDownList(\backend\models\ArticleStatus::find()
            ->select(['status_name','id'])
            ->orderBy('id')
            ->indexBy('id')
            ->column(),
            ['prompt' => '请选择状态'])->label('状态')
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
