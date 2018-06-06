<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Sexo;
use backend\models\Categoria;
use backend\models\Status;
use backend\models\Tipo;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Animal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="animal-form">

    <?php $form = ActiveForm::begin(['id' => 'form-animal','enableAjaxValidation'=>true]); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'IdTipo')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Tipo::find()->all(),
                    'IdTipo','Tipo'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select a type'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>

    <?= $form->field($model, 'IdStatus')->dropDownList(ArrayHelper::map(Status::find()->all(),
                    'IdStatus','Status'),['prompt'=>'Select a status']);?> 

    <?= $form->field($model, 'IdCategoria')->dropDownList(ArrayHelper::map(Categoria::find()->all(),
                    'IdCategoria','Categoria'),['prompt'=>'Select a category']);?> 

     <?= $form->field($model, 'IdSexo')->dropDownList(ArrayHelper::map(Sexo::find()->all(),
                    'IdSexo','Sexo'),['prompt'=>'Select a sex']);?>  

    <?= $form->field($model, 'Foto')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
