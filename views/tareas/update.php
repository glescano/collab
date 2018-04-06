<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tareas */

$this->title = 'Actualizar Tarea';
$this->params['breadcrumbs'][] = ['label' => 'Tareas', 'url' => ['index', 'asigid' => $model->asignaturas_id]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="tareas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
