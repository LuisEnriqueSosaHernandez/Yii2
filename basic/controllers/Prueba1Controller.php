<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Suma;
use app\models\EntryForm;


class Prueba1Controller extends Controller
{
    public function actionSaluda()
    {
        return $this->render('prueba1');
        //hay que crear esta pagina 
    }
     public function actionSumar()
    {
        $model=new Suma();
        $model->num1=10;
        $model->num2=15;
        $suma=$model->num1+$model->num2;
        return $this->render('resultado',["totalsuma"=>$suma,"num1"=>$model->num1,"num2"=>$model->num2,"cadena"=>'<h1>Hola mundo</h1>']);
        //hay que crear esta pagina 
    }
   public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['mensaje' => $message]);
    }
    public function actionEntry()
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // valid data received in $model

            // do something meaningful here about $model ...

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('entry', ['model' => $model]);
        }
    }
}
