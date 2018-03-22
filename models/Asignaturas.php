<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asignaturas".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property AsignaturasDocentes[] $asignaturasDocentes
 * @property Grupos[] $grupos
 * @property TareasYear[] $tareasYears
 */
class Asignaturas extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'asignaturas';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturasDocentes() {
        return $this->hasMany(AsignaturasDocentes::className(), ['asignaturas_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos() {
        return $this->hasMany(Grupos::className(), ['asignaturas_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTareasYears() {
        return $this->hasMany(TareasYear::className(), ['asignaturas_id' => 'id']);
    }

    public static function getListaAsignaturas() {
        return yii\helpers\ArrayHelper::map(Asignaturas::find()->all(), 'id', 'nombre');
    }

    public static function getNombrePorId($id) {
        $objAsignatura = static::findOne(['id' => $id]);
        return $objAsignatura->nombre;
    }

}
