<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Municipios */

$this->title = 'Update Municipios: ' . $model->IdMunicipio;
$this->params['breadcrumbs'][] = ['label' => 'Municipios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdMunicipio, 'url' => ['view', 'id' => $model->IdMunicipio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="municipios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
