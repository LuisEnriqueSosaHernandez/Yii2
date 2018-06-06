<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Estados;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Municipios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="municipios-form">

    <?php $form = ActiveForm::begin(['id' => 'form-municipios','enableAjaxValidation'=>true]); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'IdEstado')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Estados::find()->all(),
                    'IdEstado','Nombre'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select a state'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>		

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
