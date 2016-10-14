<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrganizationUser */

$this->title = '创建一级组织账号';
$this->params['breadcrumbs'][] = ['label' => 'Organization Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-user-create">

    <h1><?= Html::encode($this->title) ?></h1><hr>

    <?= $this->render('_form', [
        'model' => $model,
        'organization' => $organization,
    ]) ?>

</div>
