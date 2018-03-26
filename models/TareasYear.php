<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tareas_year".
 *
 * @property int $id
 * @property int $year
 * @property int $tareas_id
 *
 * @property Chats[] $chats
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
            [['year', 'tareas_id'], 'required'],
            [['tareas_id'], 'integer'],
            [['year'], 'string', 'max' => 4],
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
            'year' => 'Year',
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
    public function getTareas()
    {
        return $this->hasOne(Tareas::className(), ['id' => 'tareas_id']);
    }
}
