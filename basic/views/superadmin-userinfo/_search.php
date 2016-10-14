<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'user_name') ?>

    <?= $form->field($model, 'user_tel') ?>

    <?= $form->field($model, 'user_email') ?>

    <?= $form->field($model, 'user_birthday') ?>

    <?php // echo $form->field($model, 'user_academy') ?>

    <?php // echo $form->field($model, 'user_major') ?>

    <?php // echo $form->field($model, 'user_organization_id') ?>

    <?php // echo $form->field($model, 'user_department_id') ?>

    <?php // echo $form->field($model, 'user_introduction') ?>

    <?php // echo $form->field($model, 'user_reason') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
