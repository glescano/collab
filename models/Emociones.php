<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emociones".
 *
 * @property int $id
 * @property double $valencia
 * @property double $activacion
 * @property double $dominancia
 * @property int $sentencias_id
 *
 * @property Sentencias $sentencias
 */
class Emociones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emociones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valencia', 'activacion', 'dominancia'], 'number'],
            [['sentencias_id'], 'required'],
            [['sentencias_id'], 'integer'],
            [['sentencias_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sentencias::className(), 'targetAttribute' => ['sentencias_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'valencia' => 'Valencia',
            'activacion' => 'Activacion',
            'dominancia' => 'Dominancia',
            'sentencias_id' => 'Sentencias ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSentencias()
    {
        return $this->hasOne(Sentencias::className(), ['id' => 'sentencias_id']);
    }
}
