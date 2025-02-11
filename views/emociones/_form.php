<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Emociones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emociones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'valencia')->textInput() ?>

    <?= $form->field($model, 'activacion')->textInput() ?>

    <?= $form->field($model, 'dominancia')->textInput() ?>

<<<<<<< HEAD
    <?= $form->field($model, 'chats_id')->textInput() ?>
=======
    <?= $form->field($model, 'sentencias_id')->textInput() ?>
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
