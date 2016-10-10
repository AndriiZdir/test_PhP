<?php
	/**
	 * Created by PhpStorm.
	 * User: edem
	 * Date: 07.10.16
	 * Time: 14:36
	 */

	namespace frontend\controllers;

	use yii\filters\VerbFilter;
	use yii\rest\ActiveController;

	class RestController extends ActiveController
	{
		public $modelClass = 'app\models\Statistic';


		public function init ()
		{
			parent::init ();
			\Yii::$app->user->enableSession = false;
		}

		/**
		 * @return Action
		 */
		public function actionIndex ()
		{
			echo 1;
		}

		public function actions ()
		{
			$actions = parent::actions ();

			// отключить действия "delete" и "create"
			unset($actions['delete'], $actions['update'], $actions['view']);

			// настроить подготовку провайдера данных с помощью метода "prepareDataProvider()"
			$actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

			return $actions;
		}

		public function actionCreate ()
		{

		}


	}