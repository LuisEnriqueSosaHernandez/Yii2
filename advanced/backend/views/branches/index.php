<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Branches', ['value'=>Url::to('index.php?r=branches/create'),'class' => 'btn btn-success',
                                            'id'=>'modalButton']) ?>
    </p>

    <?php
    Modal::begin([
                    'header'=>'<h4>Branches</h4>',
                    'id'=>'modal',
                    'size'=>'modal-lg'
    ]);

        echo "<div id='Modal-Content'></div>";

    Modal::end();
    ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'export'=>false,
        'rowOptions'=>function($model){
                        if($model->branch_status=="inactive"){
                            return['class'=>'danger'];
                        }else if($model->branch_status=="active"){
                             return['class'=>'success'];
                        }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'companies_company_id',
                'value'=>'companiesCompany.company_name',
            ],
            [
                'class'=>'kartik\grid\EditableColumn',
                'header'=>'BRANCH',
                'attribute'=>'branch_name',
                'value'=>function($model){
                    return 'The branch name is '.$model->branch_name;
                }

            ],

            //'branch_id',
            //'companies_company_id',
            //'companiesCompany.company_name',
            'branch_name',
            'branch_address',
            'branch_created_date',
            //'branch_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>
