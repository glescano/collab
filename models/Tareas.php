<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tareas".
 *
 * @property int $id
 * @property string $nombre_t
 * @property string $descripcion
 * @property int $year
 * @property int $usar_sentencias_apertura
 * @property int $reportar_estado_animo
 * @property int $reportar_conflicto
<<<<<<< HEAD
 * @property int $actividad_gamificada
=======
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
 * @property int $asignaturas_id
 * @property int $grupos_id 
 *
 * @property Chats[] $chats
 * @property Asignaturas $asignaturas
 */
class Tareas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tareas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_t', 'year', 'asignaturas_id', 'grupos_id'], 'required'],
<<<<<<< HEAD
            [['descripcion', 'consigna'], 'string'],
            [['puntaje_tarea'],'number'],
            [['tipo_tarea'], 'string', 'max'=> 255],
            [['year', 'asignaturas_id', 'grupos_id', 'usar_sentencias_apertura', 'reportar_estado_animo', 'reportar_conflicto', 'actividad_gamificada'], 'integer'],
=======
            [['descripcion', 'consigna'], 'safe'],
            [['year', 'asignaturas_id', 'grupos_id', 'usar_sentencias_apertura', 'reportar_estado_animo', 'reportar_conflicto'], 'integer'],
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
            [['nombre_t'], 'string', 'max' => 255],
            [['asignaturas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Asignaturas::className(), 'targetAttribute' => ['asignaturas_id' => 'id']],
            [['grupos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Grupos::className(), 'targetAttribute' => ['grupos_id' => 'id']],
        ];
    }

<<<<<<< HEAD
=======
    /**
     * @inheritdoc
     */
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_t' => 'Nombre',
            'consigna' => 'Consigna',
            'descripcion' => 'Descripción',
            'year' => 'Año',
            'usar_sentencias_apertura' => 'Emplear Sentencias de Apertura',
            'reportar_estado_animo' => 'Permitir Reportar Estado de Ánimo',
            'reportar_conflicto' => 'Permitir Reportar Conflicto',
<<<<<<< HEAD
            'actividad_gamificada' => 'Permitir Actividad Gamificada 🏆',
            'asignaturas_id' => 'Asignaturas ID',
            'grupos_id' => 'Cod. de Configuración de Grupo',
            'puntaje_tarea'=>'Puntaje de la tarea',
            'tipo_tarea' => 'Tipo de tarea',
=======
            'asignaturas_id' => 'Asignaturas ID',
            'grupos_id' => 'Cod. de Configuración de Grupo',
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChats()
    {
        return $this->hasMany(Chats::className(), ['tareas_year_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturas()
    {
        return $this->hasOne(Asignaturas::className(), ['id' => 'asignaturas_id']);
    }
}
