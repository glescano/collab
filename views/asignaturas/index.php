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

    <p>
        <?= Html::a('Create Asignaturas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'nombre',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {grupos} {practicosg} {practicos_by_year}',
                'buttons' => [
                    'grupos' => function($url, $model) {
                        return Html::a('Grupos', ['grupos/index', 'asigid' => $model->id]);
                    },
                    'practicosg' => function($url, $model) {
                        return Html::a('Practicos', ['tareas/index', 'asigid' => $model->id]);
                    },
                    'practicos_by_year' => function($url, $model) {
                        return Html::a('Practicos', ['tareas-year/index', 'asigid' => $model->id]);
                    },
                ],
            ],
        ],
    ]);
    ?>
</div>
