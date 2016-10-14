<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Academy */

$this->title = '创建学院';
$this->params['breadcrumbs'][] = ['label' => 'Academies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academy-create">

    <h1><?= Html::encode($this->title) ?></h1><hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
