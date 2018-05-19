<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Comment */

$this->title = 'Update Comment: ' . $model->idcomment;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcomment, 'url' => ['view', 'id' => $model->idcomment]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
