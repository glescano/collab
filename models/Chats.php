<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chats".
 *
 * @property int $id
 * @property string $descripcion
 * @property string $fecha
 * @property int $grupos_formados_id
 * @property int $tareas_id
 *
 * @property Grupos $grupos
 * @property TareasYear $tareasYear
 * @property Sentencias[] $sentencias
 */
class Chats extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chats';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['grupos_formados_id', 'tareas_id'], 'required'],
            [['grupos_formados_id', 'tareas_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 255],
            [['grupos_formados_id'], 'exist', 'skipOnError' => true, 'targetClass' => GruposFormados::className(), 'targetAttribute' => ['grupos_formados_id' => 'id']],
            [['tareas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tareas::className(), 'targetAttribute' => ['tareas_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'fecha' => 'Fecha',
            'grupos_formados_id' => 'Grupos ID',
            'tareas_id' => 'Tarea',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasOne(GruposFormados::className(), ['id' => 'grupos_formados_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTareasYear()
    {
        return $this->hasOne(Tareas::className(), ['id' => 'tareas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSentencias()
    {
        return $this->hasMany(Sentencias::className(), ['chats_id' => 'id']);
    }
}
