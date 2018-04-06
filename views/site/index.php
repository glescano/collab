<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'COLLAB';
$completarEstiloAprendizaje = false;

if (isset(Yii::$app->user->identity->id)) {
    $rolesUsuario = Yii::$app->authManager->getRolesByUser(Yii::$app->user->identity->id);
} else {
    $rolesUsuario = [];
}

if (array_key_exists('estudiante', $rolesUsuario)) {
    // Se verifica si el usuario completo el test de estilos de aprendizaje
    $objEstudiante = \app\models\Usuarios::findOne(['id', Yii::$app->user->identity->id]);
    if (empty($objEstudiante->estiloaprendizaje)) {
        $completarEstiloAprendizaje = true;
    }
}
?>

<div class="site-index">

    <div class="jumbotron">
        <h1>COLLAB</h1>

        <p class="lead">Una herramienta para soportar la comunicación en entornos de Aprendizaje Colaborativo Soportado por Computadora (ACSC).</p>
        
        <?= !(isset(Yii::$app->user->identity->id)) ? "<h2>¿Sos estudiante?</h2>" . Html::a('Create una Cuenta', ['usuarios/create', 't' => 'a'], ['class' => 'btn btn-success']) : '';?>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <?php if ($completarEstiloAprendizaje): ?>
                    <div style='margin: 0px auto 20px auto; width: 35%; text-align: center;padding: 10px; border:#FDD900 1px solid; background-color: #FEFEB4'>
                        <p>Recuerda completar el test de estilos de aprendizaje para tener un perfil completo en el sistema.</p>
                        <?= Html::a('Completar ahora...', ['usuarios/test-felder-silverman'], ['class' => 'btn btn-success'])?>
                    </div>
                <?php endif; ?>
                <img src="<?= Yii::$app->request->baseUrl . "/images/colab.png" ?>" style="display: block;margin: 0 auto;"/>            
            </div>
        </div>

    </div>
</div>
