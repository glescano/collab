<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Emociones */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Emociones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emociones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
<<<<<<< HEAD
                'confirm' => 'Are you sure you want to delete this item?',
=======
                'confirm' => 'Are you sure  you want to delete this item?',
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'valencia',
            'activacion',
            'dominancia',
<<<<<<< HEAD
            'chats_id',
=======
            'sentencias_id',
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
        ],
    ]) ?>

</div>
