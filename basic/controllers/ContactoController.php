<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Contacto;


class ContactoController extends Controller
{
    
     public function actionImprime()
    {
        $model=new Contacto();
        $model->nombre='Luis Enrique Sosa Hernandez';
        $model->alias='Sosa';
        $model->numtel=2291766675;
        $model->direccion='Rio Medio';
        return $this->render('contacto',["name"=>$model->nombre,"apodo"=>$model->alias,"numphone"=>$model->numtel,"adrees"=>$model->direccion]);
        //hay que crear esta pagina 
    }
}
