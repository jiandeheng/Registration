<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DepartmentUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'department_user_id') ?>

    <?= $form->field($model, 'department_user_username') ?>

    <?= $form->field($model, 'department_user_password') ?>

    <?= $form->field($model, 'department_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
