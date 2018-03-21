<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sentencias_apertura".
 *
 * @property int $id
 * @property string $sentencia
 * @property int $atributo
 * @property int $habilidad
 * @property int $subhabilidad
 *
 * @property SentenciasConSentenciasApertura[] $sentenciasConSentenciasAperturas
 */
class SentenciasApertura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sentencias_apertura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sentencia'], 'string', 'max' => 255],
            [['atributo', 'habilidad', 'subhabilidad'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sentencia' => 'Sentencia',
            'atributo' => 'Atributo',
            'habilidad' => 'Habilidad',
            'subhabilidad' => 'Subhabilidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSentenciasConSentenciasAperturas()
    {
        return $this->hasMany(SentenciasConSentenciasApertura::className(), ['sentencias_apertura_id' => 'id']);
    }
}
