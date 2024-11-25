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
<<<<<<< HEAD
 * @property int $chats_id
 * @property int $usuarios_id
 * @property string $time
 *
 * @property Sentencias $sentencias
 */
class Emociones extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
=======
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
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
        return 'emociones';
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public function rules() {
        return [
            [['valencia', 'activacion', 'dominancia'], 'number'],
            [['chats_id'], 'required'],
            [['chats_id'], 'integer'],
            [['usuarios_id'], 'safe'],
            [['time'], 'safe'],            
            [['chats_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chats::className(), 'targetAttribute' => ['chats_id' => 'id']],
=======
    public function rules()
    {
        return [
            [['valencia', 'activacion', 'dominancia'], 'number'],
            [['sentencias_id'], 'required'],
            [['sentencias_id'], 'integer'],
            [['sentencias_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sentencias::className(), 'targetAttribute' => ['sentencias_id' => 'id']],
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
        ];
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public function attributeLabels() {
=======
    public function attributeLabels()
    {
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
        return [
            'id' => 'ID',
            'valencia' => 'Valencia',
            'activacion' => 'Activacion',
            'dominancia' => 'Dominancia',
<<<<<<< HEAD
            'chats_id' => 'Chat ID',
=======
            'sentencias_id' => 'Sentencias ID',
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
<<<<<<< HEAD
    public function getChats() {
        return $this->hasOne(Chats::className(), ['id' => 'chats_id']);
    }

=======
    public function getSentencias()
    {
        return $this->hasOne(Sentencias::className(), ['id' => 'sentencias_id']);
    }
>>>>>>> 05b434acad30769acee29f0a6d2da576e66b11f2
}
