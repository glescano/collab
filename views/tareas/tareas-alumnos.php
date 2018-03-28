<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TareasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tareas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tareas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'descripcion',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{chat}',
                'buttons' => [
                    'chat' => function($url, $model) {
                        $usuario = Yii::$app->user->identity->id;
                        $chats = \app\models\Chats::find()->where(['tareas_id' => $model->id])->all();
                        $idChat = 0;
                        foreach ($chats as $ch) {                            
                            $grupo = \app\models\GruposAlumnos::findOne(['grupos_formados_id' => $ch->grupos_formados_id, 'usuarios_id' => $usuario]);
                            if ($grupo){
                                $idChat = $ch->id;
                            } 
                        }
                        return Html::a('Chat del Práctico', ['sentencias/create', 'chatid' => $idChat]);
                    },
                ],
            ],
        ],
    ]);
    ?>
</div>
