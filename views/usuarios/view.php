<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
$rolesUsuario = Yii::$app->authManager->getRolesByUser(Yii::$app->user->identity->id);
<<<<<<< HEAD
$parametrot = array_key_exists('profesor', $rolesUsuario) ? 'a' : 'u';
=======
$parametrot = array_key_exists('profesor', $rolesUsuario) ? 'a' :'u';
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index', 't' => $parametrot]];
$this->params['breadcrumbs'][] = $this->title;
<<<<<<< HEAD
=======


>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
?>
<div class="usuarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<<<<<<< HEAD
        <?=
        Html::a('Borrar', ['delete', 'id' => $model->id], [
=======
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que quiere eliminar este usuario?',
                'method' => 'post',
            ],
<<<<<<< HEAD
        ])
        ?>
        <?php
        $usuario = Yii::$app->user->identity->id;
        $oUser = \app\models\Usuarios::findOne(['id' => $usuario]);
        ?>
        <?= (array_key_exists('administrador', $rolesUsuario)) ? Html::a('Promover a Docente', ['promover-docente', 'id' => Yii::$app->security->encryptByPassword($model->id, $oUser->password)], ['class' => 'btn btn-success']) : '' ?>
    </p>

    <?=
    DetailView::widget([
=======
        ]) ?>
    </p>

    <?= DetailView::widget([
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'nombre',
            'apellido',
            'fechanacimiento',
            'tipo:boolean',
            'estiloaprendizaje',
<<<<<<< HEAD
            [
                'attribute' => 'personalidad',
                'label' => 'Personalidad',
                'format' => 'html',
                'value' => function($data) {
                    $personalidad = '';
                    if (isset($data->personalidad) && strlen($data->personalidad) > 0) {
                        list($extra, $agrea, $consc, $neuro, $openn) = explode(",", $data->personalidad);
                        $extra = explode(':', $extra);
                        $agrea = explode(':', $agrea);
                        $consc = explode(':', $consc);
                        $neuro = explode(':', $neuro);
                        $openn = explode(':', $openn);
                        $personalidad = "Extroversión: " . $extra[1] . "<br/>";
                        $personalidad .= "Afabilidad: " . $agrea[1] . "<br/>";
                        $personalidad .= "Excrupulosidad: " . $consc[1] . "<br/>";
                        $personalidad .= "Neuroticismo: " . $neuro[1] . "<br/>";
                        $personalidad .= "Apertura: " . $openn[1] . "<br/>";
                    }

                    return $personalidad;
                },
            ],
            'email',
        ],
    ])
    ?>
=======
            'email',            
        ],
    ]) ?>
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2

</div>
