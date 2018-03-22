<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Alumno */

$this->title = 'Test de Estilo de Aprendizaje';
/*$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="alumno-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>Este cuestionario ha sido diseÃ±ado para identificar su Estilo de Aprendizaje acorde con las categorÃ­as establecidas por Felder y Silverman. No es un test de inteligencia, ni de personalidad. Si bien no hay lÃ­mite de tiempo para contestar, no le ocuparÃ¡ mÃ¡s de 15 minutos hacerlo. Tenga en cuenta que no hay respuestas correctas o errÃ³neas, y que el resultado serÃ¡ Ãºtil en la medida en que Ud. sea sincero/a en sus respuestas.</p>

    <?= $this->render('_form_new', [
        'model' => $model,
    ]) ?>

</div>