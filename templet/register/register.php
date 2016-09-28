<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>报名系统报名页面</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  <style type="text/css">
  .header{
    width: 100%;
    height: 40px;
    background-color: #000;
  }
  .footer{
    margin-top: 30px;
  }
  .jumbotron{
    background-color: #FFF;
  }
  .register-wrap{
    width: 100%;
    min-height: 400px;
  }
  .register-input{
    border: 0px;
    border-bottom: 1px solid #CCC;
    display: block;
    padding: 10px;
    margin: 10px;
    margin-top: 20px;
    width: 90%;
  }
  .register-select{
    padding: 10px;
    margin: 10px;
    margin-top: 20px;
    width: 90%;
    height: 40px;
  }
  .register-textarea{
    padding: 10px;
    margin: 10px;
    margin-top: 20px;
    width: 90%;
    resize: none;
    border-radius: 4px;
    height: 80px;
  }
  .register-block-button{
    display: block;
    width: 90%;
    padding: 10px;
    margin: 10px;
    margin-top: 20px;
  }

  </style>  

  </head>
  <body>
    
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

    <!-- 内容 -->
    <div class="content">
      <div class="container">
        <!-- 内容页头 -->
        <div class="page-header">
          <h3>请填写报名信息</h3>
        </div>
        <!-- 内容页头 /-->

        <div class="register-wrap">
          <div class="row">
            <div class="col-md-11">
              <input class="register-input" placeholder="请输入姓名" >
              <input class="register-input" placeholder="请输入手机号码" >
              <input class="register-input" placeholder="请输入邮箱" >
              <input class="register-input" placeholder="请输入出生年月" >
              <select class="form-control register-select">
                <option value="信息工程学院">信息工程学院</option>
                <option value="药科学院">药科学院</option>
              </select> 
              <input class="register-input" placeholder="请输入班级" >
              <select class="form-control register-select">
                <option value="校团委">校团委</option>
                <option value="学生会">学生会</option>
              </select>
              <select class="form-control register-select">
                <option value="网络中心">网络中心</option>
                <option value="宣传部">宣传部</option>
              </select>
              <textarea class="register-textarea" placeholder="请输入个人简介"></textarea>
              <textarea class="register-textarea" placeholder="请输入报名原因"></textarea>
              <button class="btn btn-success register-block-button">提交</button>
            </div>
          </div>
        </div>

      </div>
    </div>

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


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>