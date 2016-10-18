<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '部门管理';
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
                <div class="department-index">

                    <h1><?= Html::encode($this->title) ?></h1>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <p>
                        <?= Html::a('创建部门', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'department_id',
                            'department_name',
                            'organization.organization_name',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>

                </div>

            </div>                              

            <footer><p>All right reserved. Template by: KenKen</p></footer>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->

    
