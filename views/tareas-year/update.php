<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TareasYear */

$this->title = 'Update Tareas Year: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tareas Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tareas-year-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
