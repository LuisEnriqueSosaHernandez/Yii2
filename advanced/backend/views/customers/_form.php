<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Locations;

/* @var $this yii\web\View */
/* @var $model backend\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zip_code')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Locations::find()->all(),'location_id','zip_code'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a locations ...','id'=>'zipCode'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ]); ?>

    

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script=<<<JS
//here typed your code javascript
$('#zipCode').change(function(){
	var zipId=$(this).val();
	$.get('index.php?r=locations/get-city-province',{zipId:zipId},function(data){
		var data=$.parseJSON(data);
		$('#customers-city').attr('value',data.city);
		$('#customers-province').attr('value',data.province);
	});
});
JS;
$this->RegisterJS($script);
?>