<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Estados */

$this->title = 'Update Estados: ' . $model->IdEstado;
$this->params['breadcrumbs'][] = ['label' => 'Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdEstado, 'url' => ['view', 'id' => $model->IdEstado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
