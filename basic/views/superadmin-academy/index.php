<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AcademySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '学院信息';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="academy-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('创建新学院', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'academy_id',
			'academy_name',

			['class' => 'yii\grid\ActionColumn'],
		],
		]); ?>

</div>
