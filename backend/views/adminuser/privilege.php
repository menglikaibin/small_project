<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Adminuser;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */
$model = Adminuser::findOne($id);

$this->title = '修改权限: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => '管理员', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '权限设置';
?>

<div class="adminuser-update">

    <h1><?= Html::encode($this->title);?></h1>

    <div class="adminuser-privilege-form">

        <?php $form = ActiveForm::begin();?>

<!--        --><?//= Html::checkboxList('newPri',$AuthAssignmentArray,$allPrivilegesArray)?>
        <?= Html::checkboxList('newPri',$AuthAssignmentArray,$allPrivilegesArray);?>

        <div class="form-group">

            <?=Html::submitButton('修改')?>

        </div>

        <?php ActiveForm::end() ?>




    </div>

</div>