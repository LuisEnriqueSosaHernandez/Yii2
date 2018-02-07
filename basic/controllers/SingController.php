<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\SingUp;
class SingController extends Controller{
	public function actionRegister(){
		$model = new SingUp();
		//dentro de load va la llama al Framework para validar que los datos se pasaron
		if($model->load(Yii::$app->request->post()) && $model->validate()){
			return $this->render('welcome-page',['data' =>$model]);
		}else{
			return $this->render('singup-page',['data'=>$model]);
		}
	}
}
?>