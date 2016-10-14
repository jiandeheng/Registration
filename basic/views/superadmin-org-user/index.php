<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrganizationUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '一级组织账号';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建一级组织账号', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'organization_user_id',
            'organization_user_username',
            // 'organization_id',
            [
                'label' => '所属组织',
                'value' => 'organization.organization_name',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
