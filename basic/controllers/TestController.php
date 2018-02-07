<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;


class TestController extends Controller
{
   public function actionPaso()
    {
        return $this->render('index');
        //hay que crear esta pagina 
    }
    public function actionPaso2()
    {
        return $this->render('ejemplo');
        //hay que crear esta pagina 
    }
}
