<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TareasYearSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tareas Years';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tareas-year-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tareas Year', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'asignaturas_id',
            'tareas_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
