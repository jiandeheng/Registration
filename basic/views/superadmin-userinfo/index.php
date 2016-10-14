<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '报名信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加报名者', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'user_id',
            'user_name',
            'user_tel',
            // 'user_email:email',
            // 'user_birthday',
            'user_academy',
            'user_major',
            // 'user_organization_id',
            // 'user_department_id',
            // 'user_introduction:ntext',
            // 'user_reason:ntext',
            // 'status',
            'userOrganization.organization_name',
            'userDepartment.department_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
