<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tareas_year".
 *
 * @property int $id
 * @property int $asignaturas_id
 * @property int $tareas_id
 *
 * @property Chats[] $chats
 * @property Asignaturas $asignaturas
 * @property Tareas $tareas
 */
class TareasYear extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tareas_year';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['asignaturas_id', 'tareas_id'], 'required'],
            [['asignaturas_id', 'tareas_id'], 'integer'],
            [['asignaturas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Asignaturas::className(), 'targetAttribute' => ['asignaturas_id' => 'id']],
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
            'asignaturas_id' => 'Asignaturas ID',
            'tareas_id' => 'Tareas ID',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTareas()
    {
        return $this->hasOne(Tareas::className(), ['id' => 'tareas_id']);
    }
}
