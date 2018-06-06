<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Sexo;
use frontend\models\Tipo;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Animal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="animal-form">

    <?php $form = ActiveForm::begin(['id'=>$model->formName()]); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'IdSexo')->dropDownList(ArrayHelper::map(Sexo::find()->all(),
                    'IdSexo','Sexo'),['prompt'=>'Select a sex']);?>  

     <?= $form->field($model, 'IdTipo')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Tipo::find()->all(),
            'IdTipo','Tipo'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a kind'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>
    <?= $form->field($model, 'Foto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $script= <<< JS
$('form#{$model->formName()}').on('beforeSubmit',function(e)
{
    var \$form=$(this);
    $.post(
        \$form.attr("action"),
        \$form.serialize()
    )
        .done(function(result){
             if(result==1)
              {
                 $(\$form).trigger("reset");
             $.pjax.reload({container:'#Animales'});
              }else
              {
                  $("#message").html(result);
              }
        }).fail(function(){
            console.log("server error");
        });
        return false;
    });
JS;
$this->registerJs($script);
?>