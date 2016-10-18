<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a href="<?php echo yii\helpers\Url::to(['depadmin/index']) ?>"><i class="fa fa-dashboard"></i> 控制面板</a>
            </li>
            <li>
                <a href="<?php echo yii\helpers\Url::to(['depadmin-userinfo/index']) ?>" class="active-menu"><i class="fa fa-desktop"></i> 报名信息</a>
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
                <div class="user-view">

                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>
                        <?= Html::a('更新', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('删除', ['delete', 'id' => $model->user_id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => '你确定要删除该报名信息?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'user_id',
                            'user_name',
                            'user_tel',
                            'user_email:email',
                            'user_birthday',
                            'user_academy',
                            'user_major',
                            // 'user_organization_id',
                            // 'user_department_id',
                            'userOrganization.organization_name',
                            'userDepartment.department_name',
                            'user_introduction:ntext',
                            'user_reason:ntext',
                        ],
                    ]) ?>

                </div>

            </div>                              

            <footer><p>All right reserved. Template by: KenKen</p></footer>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->


