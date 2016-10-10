<?php

	use yii\helpers\Html;
	use yii\widgets\DetailView;

	/* @var $this yii\web\View */
	/* @var $model app\models\Sites */

	$this->title = $model->id;
	$this->params['breadcrumbs'][] = ['label' => 'Sites', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sites-view">

	<h1><?= Html::encode ($this->title) ?></h1>

	<p>
		<?= Html::a ('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a ('Delete', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data'  => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method'  => 'post',
			],
		]) ?>
	</p>

	<?= DetailView::widget ([
		'model'      => $model,
		'attributes' => [
			'id',
			'domain',
			'api_key:ntext',
			'created_at',
		],
	]) ?>
<!--	<pre>-->
<!--		--><?// print_r($_SERVER)?>
<!--	</pre>-->
	<div class="text-center" style="font-size: 2em; padding: 20px">Код  API для вставки на сайт</div>

	<pre style="height: 350px">
&lt;?php
	$context = stream_context_create(array(
		'http' => array(
		'method' => 'POST',
		'header' => 'Content-Type: application/x-www-form-urlencoded' . PHP_EOL,
		'content' => array(
			'domain_id' => <?=$model->id?>,
			'ip'    => &lt;?=$_SERVER['REMOTE_ADDR']?>,
			'browser'    => &lt;?=$_SERVER['HTTP_USER_AGENT']?>,
			'get'    => &lt;?=$_SERVER['REQUEST_URI']?>,
			'created_at' => &lt;?=$_SERVER['REQUEST_TIME']?>,
		),
		),
    ));
	file_get_contents($file = "http://frontend.dev/rest/create", $use_include_path = false, $context);
?>
	</pre>

	<!--<pre>-->
	<!--    --><? //print_r($statistic)?>
	<!--</pre>-->

	<?
		use miloschuman\highcharts\Highstock;
		use yii\web\JsExpression;

		$js = <<<MOO
    $(function () {
        var seriesOptions = [],
            seriesCounter = 0,
            names = ['MSFT', 'AAPL', 'GOOG'];

        $.each(names, function(i, name) {

            $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename='+ name.toLowerCase() +'-c.json&callback=?',   function(data) {

                seriesOptions[i] = {
                    name: name,
                    data: data
                };

                // As we're loading the data asynchronously, we don't know what order it will arrive. So
                // we keep a counter and create the chart when all the data is loaded.
                seriesCounter++;

                if (seriesCounter == names.length) {
                    createChart(seriesOptions);
                }
            });
        });
    });
MOO;

		$this->registerJs ($js);

		echo Highstock::widget ([
			// The highcharts initialization statement will be wrapped in a function
			// named 'createChart' with one parameter: data.
			'callback' => 'createChart',
			'options'  => [
				'rangeSelector' => [
					'selected' => 4
				],
				'yAxis'         => [
					'labels'    => [
						'formatter' => new JsExpression("function () {
                    return (this.value > 0 ? ' + ' : '') + this.value + '%';
                }")
					],
					'plotLines' => [[
						'value' => 0,
						'width' => 2,
						'color' => 'silver'
					]]
				],
				'plotOptions'   => [
					'series' => [
						'compare' => 'percent'
					]
				],
				'tooltip'       => [
					'pointFormat'   => '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
					'valueDecimals' => 2
				],
				'series'        => new JsExpression('data'), // Here we use the callback parameter, data
			]
		]);
	?>
</div>
