<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Academy */

$this->title = $model->academy_id;
$this->params['breadcrumbs'][] = ['label' => 'Academies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academy-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(' 更新 ', ['update', 'id' => $model->academy_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(' 删除 ', ['delete', 'id' => $model->academy_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除该学院?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'academy_id',
            'academy_name',
        ],
    ]) ?>

</div>
