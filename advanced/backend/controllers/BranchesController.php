<?php

namespace backend\controllers;

use Yii;
use backend\models\Branches;
use backend\models\BranchesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\helpers\Json;
use yii\widgets\ActiveForm;

/**
 * BranchesController implements the CRUD actions for Branches model.
 */
class BranchesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Branches models.
     * @return mixed
     */
    public function actionIndex()
    {
        $comments=Yii::$app->db2->createCommand("SELECT * FROM `comment`")->queryAll();
        print_r($comments);
        //die();
        $searchModel = new BranchesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(Yii::$app->request->post('hasEditable')){
            $branchId=Yii::$app->request->post('editableKey');
            $branch=Branches::findOne($branchId);

            $out=Json::encode(['output'=>'','message'=>'']);
            $post=[];
            $posted=current($_POST['Branches']);
            $post['Branches']=$posted;
            if($branch->load($post)){
                $branch->save();
               // $output='my values';
                //$out=Json::encode(['output'=>$output,'message'=>'']);
            }
            echo $out;
            return;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Branches model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Branches model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        

        if(Yii::$app->user->can('create-branch')){
            $model = new Branches();

            if ($model->load(Yii::$app->request->post())) {
             $model->branch_created_date=date('Y-m-d H:i:s');
            if($model->save()){
                echo 1;
            }else{
                echo 0;
            }
            
        }else{

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }
        }else{
            //formas de redirigir al mismo sitio
            /* $searchModel = new BranchesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            //throw new ForbiddenHttpException;
           return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
       // return $this->redirect(['index']);
        return $this->renderAjax('incorrect');
        }
    }

    public function actionValidation()
    {
        $model = new Branches();
        if(Yii::$app->request->isAjax&&$model->load(Yii::$app->request->post()))
            {
                Yii::$app->response->format='json';
                return ActiveForm::validate($model);
            }
    }

    public function actionImportExcel()
    {
        $inputFile='uploads/branches_file.xlsx';
        try
        {
            $inputFileType=\PHPExcel_IOFactory::identify($inputFile);
            $objReader=\PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel=$objReader->load($inputFile);
        }catch(Exception $e){
            die('Error');
        }
        $sheet=$objPHPExcel->getSheet(0);
        $highestRow=$sheet->getHighestRow();
        $highestColumn=$sheet->getHighestColumn();
        $data=[];
        for($row=1;$row<=$highestRow;$row++)
            {
                $rowData=$sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);

                if($row==1)
                {
                    continue;
                }
                if(!empty($rowData[0][0]))
                {
                     $data[]=[$rowData[0][0],$rowData[0][1],$rowData[0][2],$rowData[0][3],date('Y-m-d H:i:s'),$rowData[0][5]];
                }
                //print_r($branch->getErrors());
                }
                Yii::$app->db->createCommand()
                ->batchInsert('branches',['branch_id','companies_company_id',
                'branch_name','branch_address','branch_created_date','branch_status'],$data)
                ->execute();
                die('okay');
    }

    /**
     * Updates an existing Branches model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->branch_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Branches model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionLists($id){
        $countBranches=Branches::find()
        ->where(['companies_company_id'=>$id])
        ->count();

        $branches=Branches::find()
        ->where(['companies_company_id'=>$id])
        ->all();

        if($countBranches>0)
        {
            foreach($branches as $branch)
            {
                echo "<option value='".$branch->branch_id."'>".$branch->branch_name."</option>";
            }
        }
        else 
        {
            echo "<option>-</option>";
        }

    }

    /**
     * Finds the Branches model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Branches the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpload()
    {
        $fileName = 'file';
        $uploadPath = 'uploads';

        if (isset($_FILES[$fileName])) {
            $file = \yii\web\UploadedFile::getInstanceByName($fileName);

            //Print file data
            //print_r($file);

            if ($file->saveAs($uploadPath . '/' . $file->name)) {
                //Now save file data to database

                echo \yii\helpers\Json::encode($file);
            }
    }else
    {
        return $this->render('upload');
    }

    return false;
    }

    protected function findModel($id)
    {
        if (($model = Branches::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
