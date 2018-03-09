<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EventoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idAsistente') ?>

    <?= $form->field($model, 'NombreAsistente') ?>

    <?= $form->field($model, 'FechaNacimiento') ?>

    <?= $form->field($model, 'Edad') ?>

    <?= $form->field($model, 'Correo') ?>

    <?php // echo $form->field($model, 'Tel') ?>

    <?php // echo $form->field($model, 'Organizacion') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <?php // echo $form->field($model, 'Ciudad') ?>

    <?php // echo $form->field($model, 'Ingresos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
