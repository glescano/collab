<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tareas */

$this->title = 'Actividad Correspondiente a ' . app\models\Asignaturas::findOne(['id' => $model->asignaturas_id])->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Tareas', 'url' => ['index', 'asigid' => $model->asignaturas_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tareas-view">

    <h1><?= Html::encode($this->title) ?></h1>    

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Está seguro que desea eliminar esta tarea?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'descripcion',
            'year',
            [
                'attribute' => 'usar_sentencias_apertura',
                'label' => 'Usa Sentencias de Apertura',
                'value' => function($data) {
                    return ($data->usar_sentencias_apertura) ? 'Sí' : 'No';
                },
            ],
            [
                'attribute' => 'reportar_estado_animo',
                'label' => 'Permite Reportar Estado de Ánimo',
                'value' => function($data) {
                    return ($data->reportar_estado_animo) ? 'Sí' : 'No';
                },
            ],
            [
                'attribute' => 'reportar_conflicto',
                'label' => 'Permite Reportar Conflictos',
                'value' => function($data) {
                    return ($data->reportar_conflicto) ? 'Sí' : 'No';
                },
            ],
        ],
    ])
    ?>

</div>
