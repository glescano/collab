<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GruposSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$usuario = Yii::$app->user->identity->id;
$oUser = \app\models\Usuarios::findOne(['id' => $usuario]);

$this->title = 'Grupos Formados en ' . app\models\Asignaturas::findOne(['id' => $asigid])->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Asignaturas', 'url' => ['asignaturas/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Grupos', ['create', 'asigid' => Yii::$app->security->encryptByPassword($asigid, $oUser->password)], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'codigo',
            'year',
            [
                'attribute' => 'metodos_formacion_id',
                'label' => 'Método de Formación',
                'value' => function($data) {
                    return app\models\MetodosFormacion::getNombrePorId($data->metodos_formacion_id);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function($url, $model) {
                        $contenido = '<span class="glyphicon glyphicon-eye-open"></span>';
                        return Html::a($contenido, ['grupos/view', 'id' => $model->id], ['title' => 'Ver']);
                    },
                ],
            ],
        ],
    ]);
    ?>
</div>
