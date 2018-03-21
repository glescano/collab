<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SentenciasConSentenciasApertura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sentencias-con-sentencias-apertura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sentencias_id')->textInput() ?>

    <?= $form->field($model, 'sentencias_apertura_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
