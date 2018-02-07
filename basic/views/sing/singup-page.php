<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<style type="text/css">
	div.required label.control-label:after {
    content: " *";
    color: red;
}
</style>
<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($data, 'first_name') ?>
	<?= $form->field($data, 'last_name') ?>
	<?= $form->field($data, 'email') ?>
	<?= $form->field($data, 'company') ?>
	<!--Una drop down list , se pasa el arreglo de valores y el prompt (la leyenda 'elige uno'):v-->
	<?= $form->field($data, 'role') ->dropdownList([
		1=>'Estudiante',
		2=>'Profesionista',
		3=>'Empresario'],
		['prompt'=>'Select a role'])?>
	<?= $form->field($data, 'country') ?>
	<?= $form->field($data, 'prog_lengauge') ?>
	<?= $form->field($data, 'rcv_inf') ?>
	<div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php $form = ActiveForm::end(); ?>