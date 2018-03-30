<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChatsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chats';
$this->params['breadcrumbs'][] = $this->title;
$usuarioid = Yii::$app->user->identity->id;
$recuperarChat = Yii::$app->urlManager->createUrl(['chats/recuperar-chat', 'chatid' => $chatid]);
$enviarSentencia = Yii::$app->urlManager->createUrl(['sentencias/crear-con-ajax']);
$sentenciasApertura = Yii::$app->urlManager->createUrl(['sentencias-apertura/recuperar-sentencias']);

$script = <<< JS
    $(function () {
        var bSeleccionSentencia = 0;
        var interval = setInterval(function(){
            $.ajax({
                url: "$recuperarChat",
            }).done(function (data) {
                $('#divChat').html(data);
                var objDiv = document.getElementById("divChat");
                objDiv.scrollTop = objDiv.scrollHeight;
            });
        }, 1000);  
        
        $('#cbxSubhabilidad').change(function () {
            $.ajax({
                url: "$sentenciasApertura",
                data: {idsubhab: $('#cbxSubhabilidad').val()},
            }).done(function (data) {
                sentencias = JSON.parse(data);        
                string = "";
                for(var i = 0; i < sentencias.length; i++){
                    string +='<option value="' + sentencias[i].id + '">' + sentencias[i].sentencia +'</option>'                
                }
                $('#cbxSentencias').html(string);            
            });
        });         
            
        $('#cbxSentencias').change(function(){
            bSeleccionSentencia = 1;
            $('#txtSentencia').prop('disabled', false);
        });        
        
        $('#frmChat').submit(function (e) {
            e.preventDefault();    
            var sentenciaApertura = '';
            if (bSeleccionSentencia == 1){
                sentenciaApertura = '<b>' + $('#cbxSentencias :selected').text() + '</b> ';
            }
            var sentenciaEnviar = sentenciaApertura + $('#txtSentencia').val();
            $.ajax({
                method: 'GET',
                url: "$enviarSentencia",
                data: {sentencia: sentenciaEnviar, usuarios_id:$usuarioid, chats_id:$chatid},
            }).done(function () {
                $('#txtSentencia').val('')
                return true;
            });
        });           
    });                             
JS;
$this->registerJs($script, yii\web\View::POS_END);
$sentenciaApertura = new app\models\SentenciasApertura();
?>

<div class="chats-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div id='divChat' style="width: 900px; height: 400px; overflow-y: scroll;"></div>
    <div>
        <form id="frmChat">
            <?php if ($tarea->usar_sentencias_apertura == 1): ?>
                <label><b>Empeza tu aporte con alguna de estas frases:</b></label><br/>
                <label for="cbxSubhabilidades">Tipo de aporte:</label>
                <select id="cbxSubhabilidad" name="cbxSubhabilidades">
                    <?php foreach ($sentenciaApertura->a_subhabilidad as $id => $subhabilidad): ?>
                        <option value="<?php echo $id; ?>"><?php echo $subhabilidad; ?></option>
                        <?php
                    endforeach;
                    ?>
                </select><br/>
                <label>Frases disponibles:</label>
                <select id="cbxSentencias" name="cbxSentencias">                    
                </select><br/>
            <?php endif; ?>
            <input id="txtSentencia" name="txtSentencia" value="" <?php echo ($tarea->usar_sentencias_apertura == 1) ? 'disabled="disabled"' : '';?> style=" width: 600px;height: 60px;"/><br/>            
            <input type="submit" id="btnEnviar" name="btnEnviar" value="Enviar"/>
        </form>
    </div>

</div>
