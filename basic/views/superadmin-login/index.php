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
    <title>报名系统超级管理员登录</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/superadmin/superadmin-login.css" rel="stylesheet">

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

    <!-- 头部标题 -->
    <div class="superadmin-login-header">
      <h2>报名系统超级管理员登录页面</h2>
    </div>
    <!-- /头部标题-->

    <!-- 内容 -->
    <div class="superadmin-login-content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="superadmin-login">
              <h4>超管登录</h4>
              <div class="superadmin-login-login">

                  <?php $form = ActiveForm::begin([
                      'fieldConfig' => [
                            'template' => '{input}<div>{error}</div>',
                        ],
                  ]); ?>

                      <?= $form->field($model, 'loginUsername')->textInput(['class' => 'superadmin-login-input', 'placeholder' => '请输入账号...']) ?>
                      <?= $form->field($model, 'loginPassword')->passwordInput(['class' => 'superadmin-login-input', 'placeholder' => '请输入密码...']) ?>
                  
                      <div class="form-group">
                          <?= Html::submitButton('登录', ['class' => 'btn btn-success superadmin-login-button']) ?>
                      </div>
                  <?php ActiveForm::end(); ?>

              </div><!-- superadmin-login-login -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /内容 -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>