<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupos".
 *
 * @property int $id
 * @property string $codigo
 * @property int $year
 * @property int $cantidadintegrantes
 * @property int $asignaturas_id
 * @property int $metodos_formacion_id
 *
 * @property Chats[] $chats
 * @property Asignaturas $asignaturas
 * @property MetodosFormacion $metodosFormacion
 * @property GruposAlumnos[] $gruposAlumnos
 */
class Grupos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['asignaturas_id', 'metodos_formacion_id', 'codigo', 'cantidadintegrantes'], 'required'],
            [['asignaturas_id', 'metodos_formacion_id', 'cantidadintegrantes'], 'integer'],
            [['year'], 'string', 'max' => 4],
            [['asignaturas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Asignaturas::className(), 'targetAttribute' => ['asignaturas_id' => 'id']],
            [['metodos_formacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => MetodosFormacion::className(), 'targetAttribute' => ['metodos_formacion_id' => 'id']],
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
            'codigo' => 'Código',
            'cantidadintegrantes' => 'Cantidad de Integrantes',
            'asignaturas_id' => 'Asignaturas ID',
            'metodos_formacion_id' => 'Metodos Formacion ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChats()
    {
        return $this->hasMany(Chats::className(), ['grupos_id' => 'id']);
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
    public function getMetodosFormacion()
    {
        return $this->hasOne(MetodosFormacion::className(), ['id' => 'metodos_formacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGruposAlumnos()
    {
        return $this->hasMany(GruposAlumnos::className(), ['grupos_id' => 'id']);
    }
}
