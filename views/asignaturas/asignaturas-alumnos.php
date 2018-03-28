<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AsignaturasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asignaturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignaturas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'asignaturas_id',
                'label' => 'Asignaturas',
                'value' => function($data) {
                    return app\models\Asignaturas::getNombrePorId($data->asignaturas_id);
                },
            ],
            'year',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{practicos}',
                'buttons' => [
                    'practicos' => function($url, $model) {
                        return Html::a('Prácticos', ['tareas/tareas-alumnos', 'asigid' => $model->id, 'year' => $model->year]);
                    },
                ],
            ],
        ],
    ]);
    ?>
</div>
