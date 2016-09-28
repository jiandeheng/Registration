<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

    <!-- 内容 -->
    <div class="content">
      <div class="container">
        <!-- 内容页头 -->
        <div class="page-header">
          <h3>请填写报名信息</h3>
          <?php 
          if (Yii::$app->session->hasFlash('info')) {
            echo Yii::$app->session->getFlash('info');
          }
          ?>
        </div>
        <!-- 内容页头 /-->

        <div class="register-wrap">
          <div class="row">
            <div class="col-md-11">
              <?php $form = ActiveForm::begin([
                  'id' => 'register-form',
                  'fieldConfig' => [
                            'template' => '{input}<div>{error}</div>',
                        ],
                  'options' => [
                            'role' => 'form',
                            'class' => 'form-horizontal',
                        ],
                  'action' => ['register/register'],
              ]); ?>
              <?= $form->field($model, 'user_name')->textInput(['class' => 'register-input' ,'placeholder' => '请输入中文名']) ?>
              <?= $form->field($model, 'user_tel')->textInput(['class' => 'register-input' ,'placeholder' => '请输入手机号码']) ?>
              <?= $form->field($model, 'user_email')->textInput(['class' => 'register-input' ,'placeholder' => '请输入邮箱']) ?>
              <?= $form->field($model, 'user_birthday')->textInput(['class' => 'register-input' ,'placeholder' => '请输入出生年月']); ?>
              <?= $form->field($model, 'user_academy')->dropDownList($academy,[
                  'class' => 'form-control register-select'
              ]) ?>
              <?= $form->field($model, 'user_major')->textInput(['class' => 'register-input' ,'placeholder' => '请输入班级']); ?>
              <?= $form->field($model, 'user_organization')->dropDownList($organization,[
                  'class' => 'form-control register-select'
              ]) ?>
              <?= $form->field($model, 'user_department')->dropDownList($department,[
                  'class' => 'form-control register-select'
              ]) ?>
              <?= $form->field($model, 'user_introduction')->textarea(['class' => 'register-textarea', 'placeholder' => '请输入个人简介']) ?>
              <?= $form->field($model, 'user_reason')->textarea(['class' => 'register-textarea', 'placeholder' => '请输入报名原因']) ?>
              <?= Html::submitButton('报名', ['class' => 'btn btn-success register-block-button']); ?>
              <?php ActiveForm::end(); ?>
            </div>
          </div>
        </div>

      </div>
    </div>
