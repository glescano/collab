<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Grupos */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desea eliminar esta configuración de grupos?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
