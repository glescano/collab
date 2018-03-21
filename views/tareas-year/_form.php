<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TareasYear */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tareas-year-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'asignaturas_id')->textInput() ?>

    <?= $form->field($model, 'tareas_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
