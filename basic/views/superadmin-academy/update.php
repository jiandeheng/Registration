<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Academy */

$this->title = '更新学院: ' . ' ' . $model->academy_id;
$this->params['breadcrumbs'][] = ['label' => 'Academies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->academy_id, 'url' => ['view', 'id' => $model->academy_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="academy-update">

    <h1><?= Html::encode($this->title) ?></h1><hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
