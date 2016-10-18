<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = $model->department_id;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a href="<?php echo yii\helpers\Url::to(['orgadmin/index']) ?>"><i class="fa fa-dashboard"></i> 控制面板</a>
            </li>
            <li>
                <a href="<?php echo yii\helpers\Url::to(['orgadmin-dep/index']) ?>" class="active-menu"><i class="fa fa-desktop"></i> 部门管理</a>
            </li>
            <li>
                <a href="<?php echo yii\helpers\Url::to(['orgadmin-dep-user/index']) ?>"><i class="fa fa-bar-chart-o"></i> 账号管理</a>
            </li>
            <li>
                <a href="<?php echo yii\helpers\Url::to(['orgadmin-userinfo/index']) ?>"><i class="fa fa-qrcode"></i> 报名信息</a>
            </li>

        </ul>
    </div>
</nav>

<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    学院管理 <small>管理整个系统的学院</small>
                </h1>
            </div>
        </div> 
        <!-- /. ROW  -->


        <div class="row">
            <div class="col-md-12">

                <!-- content -->
                <div class="department-view">

                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>
                        <?= Html::a('更新', ['update', 'id' => $model->department_id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('删除', ['delete', 'id' => $model->department_id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => '你确定要删除该部门?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'department_id',
                            'department_name',
                            'organization.organization_name',
                        ],
                    ]) ?>

                </div>

            </div>                              

            <footer><p>All right reserved. Template by: KenKen</p></footer>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->

    


