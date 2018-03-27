<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Grupos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grupos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'year')->textInput() ?>
    
    <?= $form->field($model, 'codigo')->textInput() ?>
    
    <?= $form->field($model, 'cantidadintegrantes')->textInput() ?>

    <?= $form->field($model, 'metodos_formacion_id')->dropDownList(app\models\MetodosFormacion::getListaMetodosFormacion()); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
