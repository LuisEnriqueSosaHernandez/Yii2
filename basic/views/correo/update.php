<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Correo */

$this->title = 'Update Correo: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Correos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcorreo, 'url' => ['view', 'id' => $model->idcorreo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="correo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
