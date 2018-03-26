<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tareas".
 *
 * @property int $id
 * @property string $descripcion
 * @property int $asignaturas_id
 *
 * @property TareasYear[] $tareasYears
 */
class Tareas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tareas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['asignaturas_id'], 'required'],
            [['asignaturas_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripción',
            'asignaturas_id' => 'Asignaturas ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTareasYears()
    {
        return $this->hasMany(TareasYear::className(), ['tareas_id' => 'id']);
    }
}
