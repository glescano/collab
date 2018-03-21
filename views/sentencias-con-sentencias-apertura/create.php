<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SentenciasConSentenciasApertura */

$this->title = 'Create Sentencias Con Sentencias Apertura';
$this->params['breadcrumbs'][] = ['label' => 'Sentencias Con Sentencias Aperturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sentencias-con-sentencias-apertura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
