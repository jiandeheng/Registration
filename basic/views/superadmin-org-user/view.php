<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OrganizationUser */

$this->title = $model->organization_user_id;
$this->params['breadcrumbs'][] = ['label' => 'Organization Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->organization_user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->organization_user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除该账号吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'organization_user_id',
            'organization_user_username',
            'organization.organization_name',
        ],
    ]) ?>

</div>
