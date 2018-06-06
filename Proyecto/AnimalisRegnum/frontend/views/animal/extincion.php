<?php

use yii\helpers\Html;
use Kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AnimalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Animals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="animal-index">

    <h1><?= Html::encode($this->title) ?></h1>
     <?php echo $this->render('_search', ['model' => $searchModel]); ?>
 <?php
    $gridColumns = [
        'Nombre',
        'FechaR',
        'tipo.Tipo',
        'status.Status',
        'categoria.Categoria',
        'sexo.Sexo',
    ];

    echo ExportMenu::widget([
        'dataProvider'=>$dataProvider,
        'columns'=>$gridColumns
    ]);

    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
         'rowOptions'=>function($model){
            if($model->IdStatus==3)
            {
                  return['class'=>'danger'];
            }
             if($model->IdStatus==1)
            {
                  return['class'=>'info'];
            }
             if($model->IdStatus==2)
            {
                  return['class'=>'success'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             [
            'attribute' => 'img',
            'format' => 'html',
            'label' => 'Photo',
            'value' => function ($data) {
                return Html::img($data->Foto,
                    ['width' => '60px']);
            },
        ],

            //'idAnimal',
            'Nombre',
            'FechaR',
            'tipo.Tipo',
            'status.Status',
            'categoria.Categoria',
            'sexo.Sexo',
            //'IdFoto',
            //'user_id',
        ],
    ]); ?>
</div>

