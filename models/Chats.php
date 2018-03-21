<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chats".
 *
 * @property int $id
 * @property string $descripcion
 * @property string $fecha
 * @property int $grupos_id
 * @property int $tareas_year_id
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
            [['grupos_id', 'tareas_year_id'], 'required'],
            [['grupos_id', 'tareas_year_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 255],
            [['grupos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Grupos::className(), 'targetAttribute' => ['grupos_id' => 'id']],
            [['tareas_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => TareasYear::className(), 'targetAttribute' => ['tareas_year_id' => 'id']],
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
            'grupos_id' => 'Grupos ID',
            'tareas_year_id' => 'Tareas Year ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasOne(Grupos::className(), ['id' => 'grupos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTareasYear()
    {
        return $this->hasOne(TareasYear::className(), ['id' => 'tareas_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSentencias()
    {
        return $this->hasMany(Sentencias::className(), ['chats_id' => 'id']);
    }
}
