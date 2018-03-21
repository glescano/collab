<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sentencias_con_sentencias_apertura".
 *
 * @property int $id
 * @property int $sentencias_id
 * @property int $sentencias_apertura_id
 *
 * @property Sentencias $sentencias
 * @property SentenciasApertura $sentenciasApertura
 */
class SentenciasConSentenciasApertura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sentencias_con_sentencias_apertura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sentencias_id', 'sentencias_apertura_id'], 'required'],
            [['sentencias_id', 'sentencias_apertura_id'], 'integer'],
            [['sentencias_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sentencias::className(), 'targetAttribute' => ['sentencias_id' => 'id']],
            [['sentencias_apertura_id'], 'exist', 'skipOnError' => true, 'targetClass' => SentenciasApertura::className(), 'targetAttribute' => ['sentencias_apertura_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sentencias_id' => 'Sentencias ID',
            'sentencias_apertura_id' => 'Sentencias Apertura ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSentencias()
    {
        return $this->hasOne(Sentencias::className(), ['id' => 'sentencias_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSentenciasApertura()
    {
        return $this->hasOne(SentenciasApertura::className(), ['id' => 'sentencias_apertura_id']);
    }
}
