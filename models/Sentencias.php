<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sentencias".
 *
 * @property int $id
 * @property string $sentencia
 * @property string $fecha_hora
 * @property int $usuarios_id
 * @property int $chats_id
 *
 * @property Chats $chats
 * @property Usuarios $usuarios
 * @property SentenciasConSentenciasApertura[] $sentenciasConSentenciasAperturas
 */
class Sentencias extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'sentencias';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['fecha_hora'], 'safe'],
            [['usuarios_id', 'chats_id'], 'required'],
            [['usuarios_id', 'chats_id'], 'integer'],
            [['sentencia'], 'string', 'max' => 255],
            [['chats_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chats::className(), 'targetAttribute' => ['chats_id' => 'id']],
            [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuarios_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'sentencia' => 'Sentencia',
            'usuarios_id' => 'Usuarios ID',
            'chats_id' => 'Chats ID',
            'fecha_hora' => 'Fecha y Hora',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChats() {
        return $this->hasOne(Chats::className(), ['id' => 'chats_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios() {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuarios_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSentenciasConSentenciasAperturas() {
        return $this->hasMany(SentenciasConSentenciasApertura::className(), ['sentencias_id' => 'id']);
    }
    
    public static function getSentenciasChat($chatid){
        $query = (new \yii\db\Query())
                ->select(['s.sentencia','s.fecha_hora', 'u.username'])
                ->from('sentencias as s')
                ->innerJoin('usuarios as u', 's.usuarios_id = u.id')
                ->where(['s.chats_id' => $chatid]);

        //echo $query->createCommand()->sql; die();
        return $query->all();
    }

}
