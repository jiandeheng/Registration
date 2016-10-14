<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrganizationUser */

$this->title = '更新一级组织: ' . ' ' . $model->organization_user_id;
$this->params['breadcrumbs'][] = ['label' => 'Organization Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->organization_user_id, 'url' => ['view', 'id' => $model->organization_user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="organization-user-update">

    <h1><?= Html::encode($this->title) ?></h1><hr>

    <?= $this->render('_form', [
        'model' => $model,
        'organization' => $organization,
    ]) ?>

</div>
