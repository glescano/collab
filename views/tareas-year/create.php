<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TareasYear */

$this->title = 'Create Tareas Year';
$this->params['breadcrumbs'][] = ['label' => 'Tareas Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tareas-year-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
