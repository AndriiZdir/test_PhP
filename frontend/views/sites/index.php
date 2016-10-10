<?php

	use yii\helpers\Html;
	use yii\grid\GridView;
	use yii\widgets\Pjax;

	/* @var $this yii\web\View */
	/* @var $dataProvider yii\data\ActiveDataProvider */

	$this->title = 'Sites';
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sites-index">

	<h1><?= Html::encode ($this->title) ?></h1>

	<p>
		<?= Html::a ('Create Sites', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?php Pjax::begin (); ?>
	<?= GridView::widget ([
		'dataProvider' => $dataProvider,
		'columns'      => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'domain',
			'created_at',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
	<?php Pjax::end (); ?></div>


