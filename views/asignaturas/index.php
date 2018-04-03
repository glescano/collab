<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AsignaturasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asignaturas';
$this->params['breadcrumbs'][] = $this->title;
$rolesUsuario = Yii::$app->authManager->getRolesByUser(Yii::$app->user->identity->id);
?>
<div class="asignaturas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= (array_key_exists('administrador', $rolesUsuario)) ? Html::a('Crear Asignatura', ['create'], ['class' => 'btn btn-success']) : '' ?>
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
                'template' => '{view} | {update} | {delete} | {alumnos} | {grupos} | {practicos}',
                'buttons' => [
                    'alumnos' => function($url, $model) {
                        return Html::a('Inscribir Alumnos', ['asignaturas-alumnos/index', 'asigid' => $model->id]);
                    },
                    'grupos' => function($url, $model) {
                        return Html::a('Grupos', ['grupos/index', 'asigid' => $model->id]);
                    },
                    'practicos' => function($url, $model) {
                        return Html::a('Practicos', ['tareas/index', 'asigid' => $model->id]);
                    },
                ],
            ],
        ],
    ]);
    ?>
</div>
