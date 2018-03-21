<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $nombre
 * @property string $apellido
 * @property bool $tipo
 * @property string $estiloaprendizaje
 *
 * @property AsignaturasDocentes[] $asignaturasDocentes
 * @property GruposAlumnos[] $gruposAlumnos
 * @property Sentencias[] $sentencias
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo'], 'boolean'],
            [['username'], 'string', 'max' => 45],
            [['password'], 'string', 'max' => 255],
            [['nombre', 'apellido'], 'string', 'max' => 150],
            [['estiloaprendizaje'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'tipo' => 'Tipo',
            'estiloaprendizaje' => 'Estiloaprendizaje',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturasDocentes()
    {
        return $this->hasMany(AsignaturasDocentes::className(), ['usuarios_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGruposAlumnos()
    {
        return $this->hasMany(GruposAlumnos::className(), ['usuarios_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSentencias()
    {
        return $this->hasMany(Sentencias::className(), ['usuarios_id' => 'id']);
    }
}
