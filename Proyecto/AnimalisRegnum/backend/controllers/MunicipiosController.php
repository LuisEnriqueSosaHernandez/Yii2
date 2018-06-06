<?php

namespace backend\controllers;

use Yii;
use backend\models\Municipios;
use backend\models\MunicipiosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\widgets\ActiveForm;
use yii\filters\AccessControl; 

/**
 * MunicipiosController implements the CRUD actions for Municipios model.
 */
class MunicipiosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
             'access'=>[
                'class'=>AccessControl::classname(),
                'only'=>['create','update','index','delete'],
                'rules'=>[
                    [
                    'allow'=>true,
                    'roles'=>['@']
                ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Municipios models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(\Yii::$app->user->id==28){
        $searchModel = new MunicipiosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}

    /**
     * Displays a single Municipios model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(\Yii::$app->user->id==28){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
}

    /**
     * Creates a new Municipios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->id==28){
        $model = new Municipios();

         if(Yii::$app->request->isAjax&&$model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format='json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IdMunicipio]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }
    }

    /**
     * Updates an existing Municipios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(\Yii::$app->user->id==28){
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IdMunicipio]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    }

    /**
     * Deletes an existing Municipios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(\Yii::$app->user->id==28){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    }

    /**
     * Finds the Municipios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Municipios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Municipios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
