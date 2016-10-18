<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_birthday')->textInput(['maxlength' => true, 'placeholder' => 'such as : 1995-09-03']) ?>

    

    <?= $form->field($model, 'user_academy')->dropDownList($academy) ?>

    <?= $form->field($model, 'user_major')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_department_id')->dropDownList($department) ?>

    <?= $form->field($model, 'user_introduction')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_reason')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
