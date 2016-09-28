<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="register-wrap">
          <div class="row">
            <div class="col-md-11">
<?php 
 $form = ActiveForm::begin([
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
    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>
          </div>
        </div>
<?php ActiveForm::end() ?>