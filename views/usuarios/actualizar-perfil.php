<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
$usuario = Yii::$app->user->identity->id;
$oUser = \app\models\Usuarios::findOne(['id' => $usuario]);
$rolesUsuario = Yii::$app->authManager->getRolesByUser($usuario);
$parametrot = array_key_exists('profesor', $rolesUsuario) ? 'a' : 'u';

$this->title = 'Actualización de datos';

?>
<div class="usuarios-update">

<<<<<<< HEAD
<h2 class="perfil-title">Actualizar datos de <span>Perfil.</span></h2>
<p style="font-size:16px;">Mantén tu perfil al día para destacar en la plataforma. 📋✨ Actualiza tu información, sube una nueva foto de perfil y muestra tu mejor versión.</p>


=======
    <h1><?= Html::encode($this->title) ?></h1>
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2

    <?=
    $this->render('_form', [
        'model' => $model,
        'operacion' => 'edicion',
    ])
    ?>

</div>