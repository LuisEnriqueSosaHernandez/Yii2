<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Evento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NombreAsistente')->textInput(['maxlength' => true]) ?>

    

    <?= $form->field($model, 'FechaNacimiento')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-m-d'
        ]
]);?>

    <?= $form->field($model, 'Edad')->textInput() ?>

    <?= $form->field($model, 'Correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Tel')->textInput() ?>

    <?= $form->field($model, 'Organizacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Estado')->textInput() ?>

    <?= $form->field($model, 'Ciudad')->textInput() ?>
<div class="form-group">
<?= $form->field($model, 'Ingresos')->radio(['label' => 'Alto', 'value' => 'Alto', 'uncheck' => null]) ?>
<?= $form->field($model, 'Ingresos')->radio(['label' => 'Medio', 'value' => 'Medio', 'uncheck' => null]) ?>
<?= $form->field($model, 'Ingresos')->radio(['label' => 'Bajo', 'value' => 'Bajo', 'uncheck' => null]) ?>
</div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
