<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
use frontend\models\Sexo;
use frontend\models\Estados;
use frontend\models\Municipios;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup','enableAjaxValidation'=>true]); ?>

                <?= $form->field($model, 'Curp')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'username')->textInput() ?>

                 <?= $form->field($model, 'Nombre')->textInput() ?>

                 <?= $form->field($model, 'ApPat')->textInput() ?>

                 <?= $form->field($model, 'ApMat')->textInput() ?>
                    
                 <?= $form->field($model, 'IdSexo')->dropDownList(ArrayHelper::map(Sexo::find()->all(),
                    'IdSexo','Sexo'),['prompt'=>'Select a sex']);?>  

                <?= $form->field($model, 'IdEstado')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Estados::find()->all(),
                    'IdEstado','Nombre'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select a state','onchange'=>'
                $.post("index.php?r=municipios/lists&id='.'"+$(this).val(),function(data){
                    $("select#signupform-idmunicipio").html(data);
                });'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>

                <?= $form->field($model, 'IdMunicipio')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Municipios::find()->all(),'IdMunicipio','Nombre'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select a municipaly ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>

                 <?= $form->field($model, 'Direccion')->textInput() ?>

                 <?= $form->field($model, 'Tel')->textInput() ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'FechaN')->widget(
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

                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'Foto')->textInput(['maxlength' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>