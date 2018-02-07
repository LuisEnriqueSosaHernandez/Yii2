<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>Success</h1>
<p>Confirn your information</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($data->first_name) ?></li>
    <li><label>Last Name: </label><?= Html::encode($data->last_name) ?></li>
    <li><label>Email</label>: <?= Html::encode($data->email) ?></li>
</ul>