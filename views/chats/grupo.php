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

$script = <<< JS
    $(function () {
        var interval = setInterval(function(){
            $.ajax({
                url: "$recuperarChat",
            }).done(function (data) {
                $('#divChat').html(data);
                var objDiv = document.getElementById("divChat");
                objDiv.scrollTop = objDiv.scrollHeight;
            });
        }, 1000);                 
    });
        
    $('#frmChat').submit(function (e) {
        e.preventDefault();
        $.ajax({
            method: 'GET',
            url: "$enviarSentencia",
            data: {sentencia: $('#txtSentencia').val(), usuarios_id:$usuarioid, chats_id:$chatid},
        }).done(function () {
            $('#txtSentencia').val('')
            return true;
        });
    });        
JS;
$this->registerJs($script, yii\web\View::POS_END);
?>

<div class="chats-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div id='divChat' style="width: 900px; height: 400px; overflow-y: scroll;"></div>
    <div>
        <form id="frmChat">
            <input id="txtSentencia" name="txtSentencia" value="" style="width: 600px;height: 60px;"/><br/>
            <input type="submit" id="btnEnviar" name="btnEnviar" value="Enviar"/>
        </form>
    </div>

</div>
