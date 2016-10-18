<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\Asset1;
Asset1::register($this);
?>
<!DOCTYPE html>
<?php $this->beginPage() ?>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>部门登录页面</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/dep-login.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php $this->head() ?>

  </head>
  <body>
    <?php $this->beginBody() ?>

    <!-- 登录表单 -->
    <div class="wrap">
      <h3>部门管理员登录</h3>
      <div class="login-form">
        <?php 
          if(Yii::$app->session->hasFlash('info')){
              echo Yii::$app->session->getFlash('info');
          }
        ?>
        <?php 
        $form = ActiveForm::begin([
            'fieldConfig' => [
                'template' => '{input}<div>{error}</div>',
            ],
        ]); 
        ?>

        <?= $form->field($model, 'psdUsername')->textInput(['class' => 'login-input', 'placeholder' => '请输入账号...']) ?>
        <?= $form->field($model, 'psdOldPassword')->passwordInput(['class' => 'login-input', 'placeholder' => '请输入原密码...']) ?>
        <?= $form->field($model, 'psdNewPassword')->passwordInput(['class' => 'login-input', 'placeholder' => '请输入新密码...']) ?>
        <?= $form->field($model, 'psdRepNewPassword')->passwordInput(['class' => 'login-input', 'placeholder' => '请输入新密码...']) ?>
         
        <div class="form-group">
          <a href="<?= yii\helpers\Url::to(['depadmin-login/login']) ?>">回到首页</a>
          <?= Html::submitButton('登录', ['class' => 'btn btn-success login-button']) ?>
        </div>
        
        <?php ActiveForm::end(); ?>
      
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <?php $this->endBody() ?>

  </body>
</html>
<?php $this->endPage() ?>