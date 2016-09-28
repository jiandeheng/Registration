<?php

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
    <title>报名系统报名页面</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/register.css">

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
    
    <!-- 头部横条 -->
    <div class="header">
    </div>

    <!-- 巨幕 -->
    <div class="jumbotron">
        <div class="container">
            <h1>报名页面</h1>
            <p>请细心考虑，选择你的心仪组织！</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">返回首页</a></p>
        </div>
    </div>

    <?= $content ?>

    <!-- 脚部 -->
    <div class="footer">
      <!-- Begin page content -->
      <div class="container">
        <div class="page-header">
          <p class="text-muted">Footer:</p>
        </div>
      </div>

      <footer>
        <div class="container">
          <p class="text-muted">Author:KenKen</p>
        </div>
      </footer>
    </div>
    <!-- 脚部 /-->


  <?php $this->endBody() ?>

    
  </body>
</html>
<?php $this->endPage() ?>