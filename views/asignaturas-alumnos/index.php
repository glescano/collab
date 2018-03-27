<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AsignaturasAlumnosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inscribir Alumnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignaturas-alumnos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Inscribir Alumno', ['create', 'asigid' => $asigid], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'usuarios_id',
                'label' => 'Alumno',
                'value' => function($data) {
                    return app\models\Usuarios::getNombrePorId($data->usuarios_id);
                },
            ],
            'year',            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
