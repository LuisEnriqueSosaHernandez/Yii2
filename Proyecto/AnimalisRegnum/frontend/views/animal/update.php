<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Animal */

$this->title = 'Update Animal: ' . $model->idAnimal;
$this->params['breadcrumbs'][] = ['label' => 'Animals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAnimal, 'url' => ['view', 'id' => $model->idAnimal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="animal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
