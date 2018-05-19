<?php
namespace app\controllers;
use app\models\Todo;
use Yii;
use yii\rest\ActiveController;
class TodoController extends ActiveController
{
	public $modelClass='app\models\Todo';

	public function actions()
	{
		$actions=parent::actions();
		unset($actions['create']);
		return $actions;
	}

	public function actionCreate()
	{
		$model=new Todo();
		$model->load(Yii::$app->request->post(),'');
		$model->status=10;
		$model->save();
		return $model;
	}
}
