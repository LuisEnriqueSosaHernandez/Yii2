<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MunicipiosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Municipios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="municipios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Municipalys',['value'=>Url::to('index.php?r=municipios/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

    <?php
    Modal::begin([
                    'header'=>'<h4>Municipalys</h4>',
                    'id'=>'modal',
                    'size'=>'modal-lg'
    ]);

        echo "<div id='Modal-Content'></div>";

    Modal::end();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdMunicipio',
            'Nombre',
            'IdEstado',
            'estado.Nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
