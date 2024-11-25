<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChatsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

<<<<<<< HEAD
$miembrosChat = app\models\Chats::getMiembrosChat($grupo_id);
$usuarioid = Yii::$app->user->identity->id;

// URLs para hacer llamados AJAX
$recuperarChat = Yii::$app->urlManager->createUrl(['chats/recuperar-chat', 'chatid' => $chatid]);
$recuperarEventosUrl = Yii::$app->urlManager->createUrl(['evento/recuperar-eventos', 'chatid' => $chatid]);
$recuperarUltimaSentenciaChat = Yii::$app->urlManager->createUrl(['chats/recuperar-ultima-sentencia-chat', 'chatid' => $chatid]);
=======
$asignatura = app\models\Asignaturas::findOne(['id' => $tarea->asignaturas_id])->nombre;
$miembrosChat = app\models\Chats::getMiembrosChat($grupo_id);

$this->title = $tarea->nombre_t;
$this->params['breadcrumbs'][] = $this->title;
$usuarioid = Yii::$app->user->identity->id;

// urls para hacer llamados AJAX
$recuperarChat = Yii::$app->urlManager->createUrl(['chats/recuperar-chat', 'chatid' => $chatid]);
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
$enviarSentencia = Yii::$app->urlManager->createUrl(['sentencias/crear-con-ajax']);
$enviarReporteEstadoAnimo = Yii::$app->urlManager->createUrl(['emociones/crear-con-ajax']);
$sentenciasApertura = Yii::$app->urlManager->createUrl(['sentencias-apertura/recuperar-sentencias']);
$rEstadoAnimo = ($tarea->reportar_estado_animo) ? 1 : 0;
$rConflicto = ($tarea->reportar_conflicto) ? 1 : 0;
<<<<<<< HEAD
$enviarReporteConflicto = Yii::$app->urlManager->createUrl(['conflictos/crear-con-ajax']);
$urlUploads = Yii::$app->request->baseUrl . "/uploads/$directorio/";
$this->title = $asignatura . " - " . $tarea->nombre_t . " / Grupo " . $miembrosChat[0]["grupos_formados_id"] . " - " . $miembrosChat[0]["alumnos"];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile(Yii::$app->request->baseUrl . '/js/jquery.rateyo.min.js', ['depends' => [\yii\jui\JuiAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl . '/emoji-picker/js/config.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl . '/emoji-picker/js/util.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl . '/emoji-picker/js/jquery.emojiarea.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl . '/emoji-picker/js/emoji-picker.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$base = Yii::$app->request->baseUrl;

// Define las variables PHP primero
$username = Yii::$app->user->identity->username;
$puntos = Yii::$app->user->identity->puntaje;

$script = <<< JS
    function enviarArchivo(nombreArchivo){        
        sentenciaEnviar = "<a href='$urlUploads" + nombreArchivo + "' target='_blank'>" + nombreArchivo + "</a>";
        $.ajax({
            method: 'GET',
            url: "$enviarSentencia",
            data: {sentencia: sentenciaEnviar, usuarios_id: $usuarioid, chats_id: $chatid},
        }).done(function (data) {           
            return true;
        });         
    }
        
=======
$enviarCuestionario = Yii::$app->urlManager->createUrl(['cuestionarios-conflicto/crear-con-ajax']);

/* $this->registerCssFile("https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css");
  $this->registerCssFile(Yii::$app->request->baseUrl . "/emoji-picker/css/emoji.css"); */


$this->registerJsFile(Yii::$app->request->baseUrl . '/js/jquery.rateyo.min.js', ['depends' => [
        \yii\jui\JuiAsset::className(),
]]);

$this->registerJsFile(Yii::$app->request->baseUrl . '/emoji-picker/js/config.js', ['depends' => [
        \yii\web\JqueryAsset::className(),
]]);

$this->registerJsFile(Yii::$app->request->baseUrl . '/emoji-picker/js/util.js', ['depends' => [
        \yii\web\JqueryAsset::className(),
]]);

$this->registerJsFile(Yii::$app->request->baseUrl . '/emoji-picker/js/jquery.emojiarea.js', ['depends' => [
        \yii\web\JqueryAsset::className(),
]]);

$this->registerJsFile(Yii::$app->request->baseUrl . '/emoji-picker/js/emoji-picker.js', ['depends' => [
        \yii\web\JqueryAsset::className(),
]]);

$base = Yii::$app->request->baseUrl;
$script = <<< JS
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
    $(function () {
        var bSeleccionSentencia = 0;
        var rEstadoAnimo = $rEstadoAnimo;
        var rConflicto = $rConflicto;
<<<<<<< HEAD
        var scrollTopBefore = 0;
        var lastScrollHeight = 0;
        var ultimaSentencia = "";
        var eventosMostrados = new Set(); // Conjunto para almacenar los IDs de eventos mostrados
        var ultimoEventoId = null; // Almacena el último ID de evento cargado

        // Variables PHP en JavaScript
        var username = "$username"; // Asigna el nombre de usuario desde PHP
        var puntos = "$puntos"; // Asigna los puntos del usuario desde PHP

        // Función para procesar y agregar eventos únicos al chat
        function agregarEventosUnicos(eventosHtml) {
            $(eventosHtml).each(function(index, eventoHtml) {
                var eventoId = $(eventoHtml).data("evento-id");
                if (eventoId && !eventosMostrados.has(eventoId)) {
                    $('#divChat').append(eventoHtml); 
                    eventosMostrados.add(eventoId); 
                    ultimoEventoId = eventoId;
                    var objDiv = document.getElementById("divChat");
                    objDiv.scrollTop = objDiv.scrollHeight;
                }
            });
        }

        // Cargar eventos iniciales y actualizar el último evento ID cargado
        function cargarEventosIniciales() {
            $.ajax({
                url: "$recuperarEventosUrl",
                method: "GET"
            }).done(function(data) {
                console.log("Eventos iniciales cargados:", data); 
                agregarEventosUnicos(data); 
                if ($(data).length > 0) {
                    ultimoEventoId = $(data).last().data("evento-id");
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error al cargar eventos iniciales:", textStatus, errorThrown);
            });
        }

        // Verificar si hay nuevos eventos comparando con el último evento cargado
        function verificarNuevosEventos() {
            $.ajax({
                url: "$recuperarEventosUrl",
                method: "GET"
            }).done(function(data) {
                var nuevoEventoId = $(data).last().data("evento-id");
                if (nuevoEventoId && nuevoEventoId !== ultimoEventoId) {
                    $('#nuevoEvento').show();
                    console.log("Nuevo evento detectado.");
                }
            });
        }

        // Cargar sentencias del chat
        $.ajax({
            url: "$recuperarChat",
        }).done(function (data) {
            $('#divChat').append(data);
            var objDiv = document.getElementById("divChat");
            objDiv.scrollTop = objDiv.scrollHeight; 
            lastScrollHeight = objDiv.scrollHeight;                      
            // Cargar eventos después de las sentencias
            cargarEventosIniciales();
        });

=======
        var presenciaConflicto = 0;
        var scrollTopBefore = 0;
        var cargaInicial = 0;
        var lastScrollHeight = 0;
        var cuestionario = {
            nc1:0,
            nc2:0,
            nc3:0,
            nc4:0,
            nc5:0,
            cc1:0,
            cc2:0,
            cc3:0,
            cc4:0,
            cc5:0,
            cc6:0,
            cc7:0,
            cc8:0,
            cc9:0,
            cc10:0,
            cc11:0,
            cc12:0,
            cc13:0,
            cc14:0,
            cc15:0,
            cc16:0,
            cc17:0,
            cc18:0,
            cc19:0,
            cc20:0
        };
        
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
        $('#divChat').scroll(function(){
            var objDiv = document.getElementById("divChat");
            scrollTopBefore = objDiv.scrollTop;
        });
        
        $('#btnGoBottom').click(function(){
            var objDiv = document.getElementById("divChat");
            objDiv.scrollTop = objDiv.scrollHeight;
            lastScrollHeight = objDiv.scrollHeight;
            $('#goBottom').hide();
        });
        
<<<<<<< HEAD
        $.ajax({
            url: "$recuperarUltimaSentenciaChat",
        }).done(function (data) {
            ultimaSentencia = data;                    
        });
        
        setInterval(function(){
            $.ajax({
                url: "$recuperarUltimaSentenciaChat",
            }).done(function (data) {
                if (ultimaSentencia !== data){
                    var objDiv = document.getElementById("divChat");
                    $('#divChat').append(data);
                    ultimaSentencia = data;  
=======
        var interval = setInterval(function(){
            $.ajax({
                url: "$recuperarChat",
            }).done(function (data) {
                $('#divChat').html(data);
                var objDiv = document.getElementById("divChat");
                if (cargaInicial == 0){
                    objDiv.scrollTop = objDiv.scrollHeight; 
                    lastScrollHeight = objDiv.scrollHeight;
                    cargaInicial = 1;
                } else{
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
                    diferencia = objDiv.scrollHeight - scrollTopBefore;
                    if( diferencia > 300 && diferencia < 490 ){
                        objDiv.scrollTop = objDiv.scrollHeight;                    
                        lastScrollHeight = objDiv.scrollHeight;
<<<<<<< HEAD
                    } else {                        
=======
                    } else {
                        
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
                        objDiv.scrollTop = scrollTopBefore;
                        if (lastScrollHeight < objDiv.scrollHeight){
                            $('#goBottom').show();
                        }                        
<<<<<<< HEAD
                    }
                }           
            });
        }, 1000);

        // Verificar nuevos eventos cada 10 segundos
        setInterval(verificarNuevosEventos, 10000);

        // Manejar el clic en el botón para cargar el nuevo evento
        $('#btnNuevoEvento').click(function() {
            $.ajax({
                url: "$recuperarEventosUrl",
                method: "GET"
            }).done(function(data) {
                agregarEventosUnicos(data); 
                $('#nuevoEvento').hide(); 
            });
        });

=======
                    }          
                }              
            });
        }, 1000);  
        
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
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
<<<<<<< HEAD
    e.preventDefault();                

    if ($('#txtSentencia').val().length != 0) {
        var sentenciaApertura = '';
        if (bSeleccionSentencia == 1){                    
            sentenciaApertura = '<b>' + $('#cbxSentencias :selected').text() + '</b> ';
        }
        var idhidden = $('#txtSentencia').data('id');
        var raw = ($("*[data-id=" + idhidden + "]").val());        
        var sentenciaEnviar = sentenciaApertura + raw;

        // Crear el formato del mensaje sin incluir el nombre de usuario ni los puntos
        var mensajeFormateado = sentenciaEnviar; // Solo envía el contenido del mensaje

        // Se envía el mensaje
        $.ajax({
            method: 'GET',
            url: "$enviarSentencia",
            data: {sentencia: mensajeFormateado, usuarios_id: $usuarioid, chats_id: $chatid},
        }).done(function (data) {
            $('#txtSentencia').val('');
            $('.emoji-wysiwyg-editor').html("");  
            return true;
        });        
    }        
});
           
        
        if (rEstadoAnimo == 1){
=======
            e.preventDefault();                
        
            if ($('#txtSentencia').val().length != 0){
                var sentenciaApertura = '';
                if (bSeleccionSentencia == 1){                    
                    sentenciaApertura = '<b>' + $('#cbxSentencias :selected').text() + '</b> ';
                }
                var idhidden = $('#txtSentencia').data('id');
                var raw = ($("*[data-id=" + idhidden + "]").val());        
                var sentenciaEnviar = sentenciaApertura + raw;

                // Se envia el mensaje
                $.ajax({
                    method: 'GET',
                    url: "$enviarSentencia",
                    data: {sentencia: sentenciaEnviar, usuarios_id:$usuarioid, chats_id: $chatid},
                }).done(function (data) {
                    $('#txtSentencia').val('');
                    $('.emoji-wysiwyg-editor').html("");
        
                    // Se reporta el estado de animo
                    if (rEstadoAnimo == 1){
                        $.ajax({
                            method: 'GET',
                            url: "$enviarReporteEstadoAnimo",
                            data: {id: data,valence: $('#pleasure').val(), arousal:$('#arousal').val(), dominance:$('#dominance').val()},
                        }).done(function () {
                            return true;
                        });
                    }  
                       
                    if (rConflicto == 1){
                        opcionSeleccionada = $('input[name=conflicto]:checked').val();
                        if (opcionSeleccionada == 'yes'){
                            presenciaConflicto = 1;
                        } else {
                            if (opcionSeleccionada == 'no' && presenciaConflicto == 1){                                
                                presenciaConflicto = 0;
                                $("#frmNC").data('sentenciaid', data).dialog("open");
                            }
                        }
                    }
                    return true;
                });        
            }        
        });
        
        if (rEstadoAnimo == 1){
            // Se establece una emoción por defecto
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
            if ($('#lblEmocionSeleccionada').html().length == 0){
                $('#pleasure').val('0.000');
                $('#arousal').val('0.000');
                $('#dominance').val('0.000');
                $('#imgEmocionSeleccionada').attr('class', 'neutral');
                $('#lblEmocionSeleccionada').html('Neutral');
            }
        
            $('input[type="button"].btnEmociones').click(function(){
                $('#pleasure').val($(this).data('pleasure'));
                $('#arousal').val($(this).data('arousal'));
                $('#dominance').val($(this).data('dominance'));
                $('#imgEmocionSeleccionada').attr('class', $(this).attr('class'));
                $('#lblEmocionSeleccionada').html($(this).data('emocion'));
<<<<<<< HEAD

                $.ajax({
                    method: 'GET',
                    url: "$enviarReporteEstadoAnimo",
                    data: {id: $chatid, valence: $('#pleasure').val(), arousal: $('#arousal').val(), dominance: $('#dominance').val(), usuarios_id: $usuarioid},
                }).done(function () {
                    return true;
                });   
=======
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
            });                
        }   
        
        if (rConflicto == 1){
<<<<<<< HEAD
            $('#btnReporteConflicto').click(function () {
                $.ajax({
                    method: 'GET',
                    url: "$enviarReporteConflicto",
                    data: {idChat: $chatid, usuarios_id: $usuarioid},
                }).done(function () {
                    return true;
                });
            });        
        }        
        
=======
            var i = 1;
            var j = 1;
            while(i <= 8){
                $('#ncp' + i).rateYo({
                    precision: 0,
                });
                i = i + 1;
            }
        
            while(j <= 20){
                $('#ccp' + j).rateYo({
                    precision: 0,
                });
                j = j + 1;
            }
        
            function validarCampo(valor, etiqueta){
                if (parseFloat(valor) == 0){
                    $('#lbl' + etiqueta).text('Proporcione una valoración');
                    return true;
                } else {
                    $('#lbl' + etiqueta).text('');
                    return false;
                }
            }
        
            function enviarRespuestasNaturalezaConflicto(){
                var error = false;
                cuestionario.nc1 = parseFloat($('#ncp1').rateYo("rating")); 
                cuestionario.nc2 = parseFloat($('#ncp2').rateYo("rating")); 
                cuestionario.nc3 = parseFloat($('#ncp3').rateYo("rating")); 
                cuestionario.nc4 = parseFloat($('#ncp4').rateYo("rating")); 
                cuestionario.nc5 = parseFloat($('#ncp5').rateYo("rating")); 
                cuestionario.nc6 = parseFloat($('#ncp6').rateYo("rating")); 
                cuestionario.nc7 = parseFloat($('#ncp7').rateYo("rating")); 
                cuestionario.nc8 = parseFloat($('#ncp8').rateYo("rating")); 
        
                // Se valida que el usuario haya seleccionado alguna opción en las estrellitas
                error = validarCampo(cuestionario.nc1, 'ncp1') || error;
                error = validarCampo(cuestionario.nc2, 'ncp2') || error;
                error = validarCampo(cuestionario.nc3, 'ncp3') || error;
                error = validarCampo(cuestionario.nc4, 'ncp4') || error;
                error = validarCampo(cuestionario.nc5, 'ncp5') || error;
                error = validarCampo(cuestionario.nc6, 'ncp6') || error;
                error = validarCampo(cuestionario.nc7, 'ncp7') || error;
                error = validarCampo(cuestionario.nc8, 'ncp8') || error;
                
                if (!error){
                    $('#frmNC').dialog("close");
                    $('#frmCC').data('sentenciaid', $('#frmNC').data('sentenciaid'));
                    return true;
                } else {
                    return false;
                }
                
            }
        
            function enviarRespuestasComportamientoConflicto(){
                var error = false;
                cuestionario.cc1 = parseFloat($('#ccp1').rateYo("rating")); 
                cuestionario.cc2 = parseFloat($('#ccp2').rateYo("rating")); 
                cuestionario.cc3 = parseFloat($('#ccp3').rateYo("rating")); 
                cuestionario.cc4 = parseFloat($('#ccp4').rateYo("rating")); 
                cuestionario.cc5 = parseFloat($('#ccp5').rateYo("rating")); 
                cuestionario.cc6 = parseFloat($('#ccp6').rateYo("rating")); 
                cuestionario.cc7 = parseFloat($('#ccp7').rateYo("rating")); 
                cuestionario.cc8 = parseFloat($('#ccp8').rateYo("rating")); 
                cuestionario.cc9 = parseFloat($('#ccp9').rateYo("rating")); 
                cuestionario.cc10 = parseFloat($('#ccp10').rateYo("rating")); 
                cuestionario.cc11 = parseFloat($('#ccp11').rateYo("rating")); 
                cuestionario.cc12 = parseFloat($('#ccp12').rateYo("rating")); 
                cuestionario.cc13 = parseFloat($('#ccp13').rateYo("rating")); 
                cuestionario.cc14 = parseFloat($('#ccp14').rateYo("rating")); 
                cuestionario.cc15 = parseFloat($('#ccp15').rateYo("rating")); 
                cuestionario.cc16 = parseFloat($('#ccp16').rateYo("rating")); 
                cuestionario.cc17 = parseFloat($('#ccp17').rateYo("rating")); 
                cuestionario.cc18 = parseFloat($('#ccp18').rateYo("rating")); 
                cuestionario.cc19 = parseFloat($('#ccp19').rateYo("rating")); 
                cuestionario.cc20 = parseFloat($('#ccp20').rateYo("rating")); 
                // Se valida que el usuario haya seleccionado alguna opción en las estrellitas        
                error = validarCampo(cuestionario.cc1, 'ccp1') || error;
                error = validarCampo(cuestionario.cc2, 'ccp2') || error;
                error = validarCampo(cuestionario.cc3, 'ccp3') || error;
                error = validarCampo(cuestionario.cc4, 'ccp4') || error;
                error = validarCampo(cuestionario.cc5, 'ccp5') || error;
                error = validarCampo(cuestionario.cc6, 'ccp6') || error;
                error = validarCampo(cuestionario.cc7, 'ccp7') || error;
                error = validarCampo(cuestionario.cc8, 'ccp8') || error;
                error = validarCampo(cuestionario.cc9, 'ccp9') || error;
                error = validarCampo(cuestionario.cc10, 'ccp10') || error;
                error = validarCampo(cuestionario.cc11, 'ccp11') || error;
                error = validarCampo(cuestionario.cc12, 'ccp12') || error;  
                error = validarCampo(cuestionario.cc13, 'ccp13') || error;
                error = validarCampo(cuestionario.cc14, 'ccp14') || error;
                error = validarCampo(cuestionario.cc15, 'ccp15') || error;
                error = validarCampo(cuestionario.cc16, 'ccp16') || error;
                error = validarCampo(cuestionario.cc17, 'ccp17') || error;
                error = validarCampo(cuestionario.cc18, 'ccp18') || error;
                error = validarCampo(cuestionario.cc19, 'ccp19') || error;
                error = validarCampo(cuestionario.cc20, 'ccp20') || error;
        
                if (!error){
                    datac = JSON.stringify(cuestionario);
                    $('#frmPC').dialog("close");
                    $.ajax({
                        method: 'POST',
                        url: "$enviarCuestionario",
                        data: {sentenciaid: $('#frmNC').data('sentenciaid'), datacuestionario:datac},
                    }).done(function () {
                        return true;
                    });
                    return true;        
                } else {
                    return false;
                }

            }

            dialog = $("#frmNC").dialog({
                closeOnEscape: false,
                autoOpen: false,
                height: 550,
                width: 750,
                modal: true,
                buttons: {
                    "Responder": enviarRespuestasNaturalezaConflicto
                },
                open: function(event, ui) {
                    $(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
                },
                close: function () {                    
                    $('#frmPC').dialog("open");
                }
            });        
        
            dialog = $("#frmPC").dialog({
                closeOnEscape: false,
                autoOpen: false,
                height: 550,
                width: 750,
                modal: true,
                buttons: {
                    "Responder": enviarRespuestasComportamientoConflicto
                },
                open: function(event, ui) {
                    $(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
                },
                close: function () {   
                    var i = 1;
                    var j = 1;
                    while(i <= 8){
                        $('#ncp' + i).rateYo("option", "rating", 0);
                        i = i + 1;
                    }

                    while(j <= 20){
                        $('#ccp' + j).rateYo("option", "rating", 0);
                        j = j + 1;
                    }                    
                    return true;
                }
            });         
        }        
        
        // Initializes and creates emoji set from sprite sheet
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
        window.emojiPicker = new EmojiPicker({
          emojiable_selector: '[data-emojiable=true]',
          assetsPath: '$base/emoji-picker/img/',
          popupButtonClasses: 'fa fa-smile-o'
        });
<<<<<<< HEAD
        window.emojiPicker.discover();
    });                             
JS;

=======
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
    });                             
JS;
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
$this->registerJs($script, yii\web\View::POS_END);
$sentenciaApertura = new app\models\SentenciasApertura();
?>

<div class="chats-index">
<<<<<<< HEAD
    <div class="consPointsNote">
        <div class="chat-tarea">
            <h1 class="chat-first-p"><span>Actividad a realizar:</span><br /></h1>
            <p class="tareaConsigna"><?= $tarea->nombre_t ?></p>
            <p class="tareaConsigna"><?= $tarea->consigna ?></p>
        </div>
    </div>
    <?php if($tarea->actividad_gamificada):?>
    <h1 style="padding-top:10px; padding-bottom:10px; font-weight:700;">Esta es una actividad Gamificada.</h1>
    <p >¡Participa en el chat y lleva tus ideas al siguiente nivel! 💬 Cada mensaje cuenta para que puedas completar la actividad, no olvides seguir la consigna para que tu aporte sea relevante y útil para el equipo. 🚀 Con cada participación, no solo contribuyes al trabajo en grupo, ¡también sumas puntos y escalas posiciones en el leaderboard! 🏆 Cuanto más activo seas, más cerca estarás de desbloquear nuevos logros y ganar recompensas. 🌟 CADA MENSAJE ENVIADO SUMA +10 puntos.</p>
    <p>Puede ser que cuando la pagina se recargue las preguntas o debates pasen arribas de la notificacion de el evento. </p>
    <p>Para responder a una pregunta usa:<span style="color:#EB6500;"> /pregunta IDPregunta respuesta.</span> por ejemplo: /pregunta 18 la respuesta es..</p>
    <p>Para responder a un Debate usa:<span style="color:#EB6500;"> /debate IDdebate respuesta. </span> por ejemplo: /debate 18 yo creo que ..</p>
    <p><span style="color:#EB6500;">Las actividades y juegos</span> no otorgan puntaje son actividades extras dentro del chat.</p>
    <?php endif;?>
    <h1>CHAT <span style="color:#EB6500;">.</span></h1>
    <div class="chats-events-emotions">
        <div id='divChat' style=" height: 400px; overflow-y: scroll;"></div>
        <br />
        <div id="goBottom" style="margin: 0 auto; width: 200px; display: none;">
            <input id="btnGoBottom" type="button" style="background-color: #FEE300;  text-align: center; padding: 5px;"
                value="Tienes nuevos mensajes" />
        </div>
        <div id="nuevoEvento" style="margin: 0 auto; width: 200px; display: none;">
            <input id="btnNuevoEvento" type="button"
                style="background-color: #BDE5F8; text-align: center; padding: 5px;" value="Tienes un nuevo evento" />
        </div>

        <form id="frmChat">
            <?php if ($tarea->usar_sentencias_apertura == 1): ?>
            <label><b>Empeza tu aporte con alguna de estas frases:</b></label><br />
            <label for="cbxSubhabilidades">Tipo de aporte:</label>
            <select id="cbxSubhabilidad" name="cbxSubhabilidades">
                <?php foreach ($sentenciaApertura->a_subhabilidad as $id => $subhabilidad): ?>
                <option value="<?php echo $id; ?>"><?php echo $subhabilidad; ?></option>
                <?php
                    endforeach;
                    ?>
            </select><br />
            <label>Frases disponibles:</label>
            <select id="cbxSentencias" name="cbxSentencias">
            </select><br />
            <?php endif; ?>
            <p class="lead emoji-picker-container">
                <input id="txtSentencia" name="txtSentencia" value=""
                    <?php echo ($tarea->usar_sentencias_apertura == 1) ? 'disabled="disabled"' : ''; ?>
                    class="form-control" style="height: 60px; width: 100px;" data-emojiable="true" />
            </p>
            <div class="input-drop">
                <input type="submit" id="btnEnviar" name="btnEnviar" value="Enviar Mensaje" />
                <?php
        $userid = Yii::$app->user->identity->id;
        $oUser = \app\models\Usuarios::findOne(['id' => $userid]);
        echo \kato\DropZone::widget([
            'options' => [
                'url' => Yii::$app->urlManager->createUrl(['chats/grupo', 'chatid' => Yii::$app->security->encryptByPassword($chatid, $oUser->password)]),
                'maxFilesize' => '2',
                'dictDefaultMessage' => "Coloque aquí los archivos para compartir",
            ],
            'clientEvents' => [
                'complete' => "function(file){console.log(file); if (file.status!='error') enviarArchivo(file.name);}",
                'removedfile' => "function(file){alert(file.name + ' is removed')}"
            ],
        ]);
        ?>
            </div>

        </form>
    </div>

    
    <div style=" width:70%; margin:20px 0px;">
   
     
    <?php if ($tarea->reportar_estado_animo == 1): ?>
        <h1>Estado de Animo <span style="color:#EB6500;">.</span></h1>
    <div class="texto-estado-animo">
    <p class="texto-estado-animo-p"> Selecciona tu estado de ánimo para expresar cómo te sientes durante la actividad. 🎭 Esto ayudará a tu equipo a comprender mejor tu perspectiva y promoverá un ambiente de colaboración más efectivo. ¡Cada emoción cuenta!</p>
        <p class="estado-seleccionado"><img id='imgEmocionSeleccionada'
                style="border:0px;" /> <label id='lblEmocionSeleccionada'></label></p>
    </div>
        <b class="estado-b" >¿Cómo te sientes?</b>
        <br />
        <div class="btns-emociones">
        <input type="button" id="btnNeutral" class='btnEmociones neutral' data-arousal="0" data-pleasure="0"
            data-dominance="0" data-emocion='Neutral' title="Neutral" />
        <input type="button" id="btnAngry" class='btnEmociones angry' data-arousal="0.59" data-pleasure="-0.51"
            data-dominance="0.25" data-emocion='Enojado' title="Enojado" />
        <input type="button" id="btnFear" class='btnEmociones fear' data-arousal="0.60" data-pleasure="-0.64"
            data-dominance="-0.43" data-emocion='Preocupado' title="Preocupado" />
        <input type="button" id="btnJoy" class='btnEmociones joy' data-arousal="0.2" data-pleasure="0.4"
            data-dominance=0.1 data-emocion='Alegre' title="Alegre" />
        <input type="button" id="btnSadness" class='btnEmociones sadness' data-arousal="-0.2" data-pleasure="-0.4"
            data-dominance="-0.1" data-emocion='Cansado' title="Cansado" />
        <input type="button" id="btnSurprise" class='btnEmociones surprise' data-arousal="0.59" data-pleasure="0.87"
            data-dominance="-0.87" data-emocion='Sorprendido' title="Sorprendido" />
        <input id="pleasure" type="hidden" value="0" min="-1" max="1" step="0.05" size="4" />
        <input id="arousal" type="hidden" value="0" min="-1" max="1" step="0.05" />
        <input id="dominance" type="hidden" value="0" min="-1" max="1" step="0.05" />
        <br /><br />
        <?php endif; ?>
        </div>
        
        <?php if ($tarea->reportar_conflicto == 1): ?>
            <h1>Estado de Animo del grupo<span style="color:#EB6500;">.</span></h1>
            <p class="texto-estado-animo-p">Descubre cómo se siente tu grupo para mejorar la dinámica de trabajo en equipo. 👥💬 Conoce el estado de ánimo general y trabaja en conjunto para resolver cualquier conflicto o potenciar la motivación. ¡La clave del éxito está en cómo nos sentimos y colaboramos!</p>
        <div>
            <input type="button" id="btnReporteConflicto" name="btnReporteConflicto"
                value="Siento que estamos con diferencias en el grupo"
                style="background-color: #FCE9C3; padding:10px;" /><br />
        </div>
        <?php endif; ?>


    </div>
    <div class="perfil-leaderboard">
        <h2 class="perfil-title leader"><span>Leader</span>board<span>.</span></h2>
        <p>
            ¡La cima te espera! 💥 Escalar en el leaderboard no solo es un desafío, es una oportunidad para demostrar tu
            habilidad, dedicación y esfuerzo. Cada punto que sumas, cada desafío que completas, te acerca más a la cima
            y al reconocimiento de toda la comunidad. ¡Imagina ver tu nombre en los primeros lugares, destacando entre
            los mejores! 🚀

            No importa dónde estés ahora, lo importante es tu determinación para avanzar. ¡Sigue completando tareas,
            gana puntos, sube de rango y demuestra lo que puedes lograr! 💪 ¡El camino al éxito comienza ahora!

            ¿Listo para conquistar la cima? Revisa tu tabla de puntuacion de cada actividad.
        </p>

    </div>
    
    <div class="perfil-logros">
        <h2 class="perfil-title"><span>¿Como consigo</span> puntos? 🎯</h2>
        <p>¡Ganar puntos en la plataforma es muy sencillo y está en tus manos! 💪 A medida que participas y te
            involucras en las actividades, tus puntos irán creciendo. Aquí te mostramos cómo puedes acumular puntos y
            destacar en la tabla de posiciones:</br>
            <strong>1. Participación en el chat:</strong> Cada mensaje que envíes te otorga +10 puntos. ¡No dudes en interactuar y colaborar
            con tu equipo!</br>
            <strong>2. Completando desafíos:</strong> Cada desafío que completes te acercará a nuevos logros y te recompensará con
            puntos.</br>
            <strong>3. Actividades individuales y grupales:</strong> Realiza tanto tareas individuales como en equipo para ganar puntos por
            tu esfuerzo.</br>
            <strong>4. Notas en tareas:</strong> Las notas que obtengas en tus tareas se multiplicarán por 100 y se sumarán a tu puntaje
            total. ¡Así que da lo mejor de ti en cada trabajo!</br>
            <strong>5. Eventos especiales:</strong> Ya sea respondiendo preguntas, participando en actividades especiales o en juegos
            asignados, cada evento te recompensará con puntos adicionales.
            </br>
            </br>
            ¡Participa, suma puntos y escala hasta la cima! 🎉</p>
    </div>
</div>
=======
    <h1><?= Html::encode($asignatura) ?></h1>    
    <h3><?= Html::encode($this->title) ?> / Grupo <?= $miembrosChat[0]["grupos_formados_id"] . " - " .$miembrosChat[0]["alumnos"] ?></h3>
    <p style="background-color: #BEF7F8; padding: 10px; font-size: 1.3em;"><b>Consigna:</b><br/><?= $tarea->consigna?></p>

    <div style="float:left; margin: 0px auto 10px auto;">
        <div id='divChat' style="width: 700px; height: 350px; overflow-y: scroll;"></div>
        <br/>
        <div id="goBottom" style="margin: 0 auto; width: 200px; display: none;">
            <input id="btnGoBottom" type="button" style="background-color: #FEE300;  text-align: center; padding: 5px;" value="Tienes nuevos mensajes"/>            
        </div>
    </div>



    <div style=" width:400px; margin:0 20px; float:left;">
        <?php if ($tarea->reportar_estado_animo == 1): ?>
            <p>Estado de &aacute;nimo seleccionado: <br/><img id='imgEmocionSeleccionada' style="border:0px;"/> <label id='lblEmocionSeleccionada'></label></p>
            <b>Me siento...</b><br/>
            <input type="button" id="btnNeutral" class='btnEmociones neutral' data-arousal="0" data-pleasure="0" data-dominance="0" data-emocion='Neutral' title="Neutral"/>
            <input type="button" id="btnAngry" class='btnEmociones angry' data-arousal="0.59" data-pleasure="-0.51" data-dominance="0.25" data-emocion='Enojado' title="Enojado"/>
            <input type="button" id="btnFear" class='btnEmociones fear' data-arousal="0.60" data-pleasure="-0.64" data-dominance="-0.43" data-emocion='Preocupado' title="Preocupado"/>
            <input type="button" id="btnJoy" class='btnEmociones joy' data-arousal="0.2" data-pleasure="0.4" data-dominance=0.1 data-emocion='Alegre' title="Alegre"/>
            <input type="button" id="btnSadness" class='btnEmociones sadness' data-arousal="-0.2" data-pleasure="-0.4" data-dominance="-0.1" data-emocion='Cansado' title="Cansado"/>
            <input type="button" id="btnSurprise" class='btnEmociones surprise' data-arousal="0.59" data-pleasure="0.87" data-dominance="-0.87" data-emocion='Sorprendido' title="Sorprendido"/>
            <input id="pleasure" type="hidden" value="0" min="-1" max="1" step="0.05" size="4" />
            <input id="arousal" type="hidden" value="0" min="-1" max="1" step="0.05" />
            <input id="dominance" type="hidden" value="0" min="-1" max="1" step="0.05" />
            <br/><br/>
        <?php endif; ?>

        <?php if ($tarea->reportar_conflicto == 1): ?>
            <div style="border: black 1px solid;padding: 10px;">
                <input type="radio" name="conflicto" value="no" checked="checked" id="ropno"/> 
                <label for="ropno">No hay diferencias en el grupo</label><br>
                <input type="radio" name="conflicto" value="yes" id="ropsi"/> 
                <label for="ropsi">Siento que estamos con diferencias en el grupo</label><br>                            
            </div>
        <?php endif; ?>
    </div>


    <div style="clear:both;">
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
            <p class="lead emoji-picker-container">
                <input id="txtSentencia" name="txtSentencia" value="" <?php echo ($tarea->usar_sentencias_apertura == 1) ? 'disabled="disabled"' : ''; ?> class="form-control" style="height: 60px; width: 100px;" data-emojiable="true" />
            </p>

            <input type="submit" id="btnEnviar" name="btnEnviar" value="Enviar"/>
        </form>
    </div>

    <?php if ($tarea->reportar_conflicto == 1): ?>
        <div id="frmNC" title="Naturaleza del Conflicto" sentencia-id="">

            <p>¿En qu&eacute; grado hubo diferencias de opini&oacute;n en su grupo? </p>                       
            <div id="ncp1" style="float:left;"></div>
            <label id="lblncp1" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>

            <p>¿Cu&aacute;n frecuente los miembros de su grupo manifiestaron desacuerdo respecto a c&oacute;mo debeían ser hechas las cosas?</p>
            <div id="ncp2" style="float:left;"></div>
            <label id="lblncp2" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>

            <p>¿Cu&aacute;n frecuente los miembros de su grupo manifiestaron desacuerdo sobre cu&aacute;les procedimientos deb&iacute;an ser usados para realizar el trabajo?</p>
            <div id="ncp3" style="float:left;"></div>
            <label id="lblncp3" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>

            <p>¿En qu&eacute; grado estos argumentos estuvieron relacionados a la tarea?</p>
            <div id="ncp4" style="float:left;"></div>
            <label id="lblncp4" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>

            <p>¿En qu&eacute; medida fueron evidentes los choques de personalidad en tu grupo?</p>
            <div id="ncp5" style="float:left;"></div>
            <label id="lblncp5" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>

            <p>¿Cu&aacute;nta tensi&oacute;n hubo entre los miembros de tu grupo?</p>
            <div id="ncp6" style="float:left;"></div>
            <label id="lblncp6" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>

            <p>¿Cu&aacute;n frecuente los miembros de tu grupo se pusieron enojados mientras trabajan en grupo?</p>
            <div id="ncp7" style="float:left;"></div>
            <label id="lblncp7" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>

            <p>¿Cu&aacute;nta rivalidad hubo entre los miembros de tu grupo?</p>
            <div id="ncp8" style="float:left;"></div>
            <label id="lblncp8" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
        </div>

        <div id="frmPC" title="Comportamientos ante el Conflicto" sentencia-id="">
            <p>En la situaci&oacute;n de conflicto anterior...</p>
            <p>1.	Me rend&iacute; a los deseos de la otra parte.</p>
            <div id="ccp1" style="float:left;"></div>
            <label id="lblccp1" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>2.	Trat&eacute; de darme cuenta de una soluci&oacute;n a mitad de camino.</p> 
            <div id="ccp5" style="float:left;"></div>
            <label id="lblccp5" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>3.	Empuje por mi propio punto de vista.</p>
            <div id="ccp9" style="float:left;"></div>
            <label id="lblccp9" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>4.	Examine los problemas hasta que encontr&eacute; una soluci&oacute;n que realmente me satisfizo a m&iacute; y a mis compa&ntilde;eros.</p>
            <div id="ccp13" style="float:left;"></div>
            <label id="lblccp13" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>5.	Evite una confrontaci&oacute;n por diferencias con mis compa&ntilde;eros.</p>
            <div id="ccp17" style="float:left;"></div>
            <label id="lblccp17" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>6.	Estuve de acuerdo con mis compa&ntilde;eros.</p>
            <div id="ccp2" style="float:left;"></div>
            <label id="lblccp2" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>7.	Intent&eacute; acomodarme a mis compa&ntilde;eros.</p>
            <div id="ccp3" style="float:left;"></div>
            <label id="lblccp3" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>8.	Me esforc&eacute; para comprometerme a los deseos de mis compa&ntilde;eros as&iacute; como buscar que ellos se comprometan a los m&iacute;os.</p>
            <div id="ccp8" style="float:left;"></div>
            <label id="lblccp8" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>9.	Elabor&eacute; una soluci&oacute;n que sirvi&oacute; tanto a m&iacute; como a los intereses de mis compa&ntilde;eros lo mejor posible.</p>
            <div id="ccp16" style="float:left;"></div>
            <label id="lblccp16" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>10.	Me adapt&eacute; a los intereses y objetivos de mis compa&ntilde;eros.</p>
            <div id="ccp4" style="float:left;"></div>
            <label id="lblccp4" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>11.	Enfatic&eacute; que ten&iacute;amos que encontrar una soluci&oacute;n de compromiso.</p>
            <div id="ccp6" style="float:left;"></div>
            <label id="lblccp6" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>12.	Intent&eacute; hacer que las diferencias sean menos severas.</p>
            <div id="ccp19" style="float:left;"></div>
            <label id="lblccp19" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>13.	Hice todo por ganar.</p>
            <div id="ccp12" style="float:left;"></div>
            <label id="lblccp12" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>14.	Insist&iacute; en que entre todos deb&iacute;mos ceder un poco.</p>
            <div id="ccp7" style="float:left;"></div>
            <label id="lblccp7" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>15.	Examin&eacute; ideas de mis compa&ntilde;eros para encontrar una soluci&oacute;n mutua &oacute;ptima.</p>
            <div id="ccp15" style="float:left;"></div>
            <label id="lblccp15" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>16.	Luch&eacute; por un buen resultado para m&iacute;.</p>
            <div id="ccp11" style="float:left;"></div>
            <label id="lblccp11" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>17.	Intent&eacute; evitar una confrontaci&oacute;n con mis compa&ntilde;eros.</p>
            <div id="ccp20" style="float:left;"></div>
            <label id="lblccp20" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>18.	Buscqu&eacute; obtener ganancias.</p>
            <div id="ccp10" style="float:left;"></div>  
            <label id="lblccp10" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>19.	Evit&eacute; diferencias de opini&oacute;n tanto como sea posible.</p>
            <div id="ccp18" style="float:left;"></div>
            <label id="lblccp18" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
            <p>20.	Defend&iacute; los objetivos e intereses propios y de mis compa&ntilde;eros.</p>
            <div id="ccp14" style="float:left;"></div>
            <label id="lblccp14" style="color: red;float:left;margin-left: 5px;font-weight: lighter;"></label>
            <br style="clear: both;"/><br/>
            
        </div>
    <?php endif; ?>
</div>
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
