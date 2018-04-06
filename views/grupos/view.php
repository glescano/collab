<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Grupos */

$asignatura = app\models\Asignaturas::findOne(['id' => $model->asignaturas_id])->nombre;
$this->title = "Grupos Formados en $asignatura";
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index', 'asigid' => $model->asignaturas_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codigo',
            'year',            
            [
                'attribute' => 'metodos_formacion_id',
                'label' => 'Método de Formación',
                'value' => function($data) {
                    return app\models\MetodosFormacion::getNombrePorId($data->metodos_formacion_id);
                },
            ],
        ],
    ]) ?>
    
    <?php 
    $grupos = app\models\GruposFormados::getDetalleGrupos($model->id);
    //var_dump($grupos);
    $titulo = "";
    foreach ($grupos as $gr){
        if ($titulo != $gr["nombre"]){
            echo "<h2>" . $gr["nombre"] . "</h2>";
            $titulo = $gr["nombre"];
        }
        echo $gr["apellidoAlumno"] . ", " . $gr["nombreAlumno"] . "<br/>";
        
    }
    ?>

</div>
