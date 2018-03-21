<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tareas".
 *
 * @property int $id
 * @property string $descripción
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
            [['descripción'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripción' => 'Descripci�n',
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
