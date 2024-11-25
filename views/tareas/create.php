<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tareas */

<<<<<<< HEAD
$this->title = 'Crear actividad'." ". $tipoactividad ;
=======
$this->title = 'Crear Tareas';
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
$this->params['breadcrumbs'][] = ['label' => 'Tareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tareas-create">

<<<<<<< HEAD
<h2 class="perfil-title"><?= Html::encode($this->title) ?><span>.</span></h1>
=======
    <h1><?= Html::encode($this->title) ?></h1>
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
