<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Evento */

$this->title = 'Update Evento: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAsistente, 'url' => ['view', 'id' => $model->idAsistente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="evento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
