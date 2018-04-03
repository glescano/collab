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
 * @property integer $tipo
 * @property string $estiloaprendizaje
 * @property string $auth_key
 *
 * @property AsignaturasDocentes[] $asignaturasDocentes
 * @property GruposAlumnos[] $gruposAlumnos
 * @property Sentencias[] $sentencias
 *
 */
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {

    //Variables para mantener las respuestas al test de Felder-Silverman
    public $preg1;
    public $preg2;
    public $preg3;
    public $preg4;
    public $preg5;
    public $preg6;
    public $preg7;
    public $preg8;
    public $preg9;
    public $preg10;
    public $preg11;
    public $preg12;
    public $preg13;
    public $preg14;
    public $preg15;
    public $preg16;
    public $preg17;
    public $preg18;
    public $preg19;
    public $preg20;
    public $preg21;
    public $preg22;
    public $preg23;
    public $preg24;
    public $preg25;
    public $preg26;
    public $preg27;
    public $preg28;
    public $preg29;
    public $preg30;
    public $preg31;
    public $preg32;
    public $preg33;
    public $preg34;
    public $preg35;
    public $preg36;
    public $preg37;
    public $preg38;
    public $preg39;
    public $preg40;
    public $preg41;
    public $preg42;
    public $preg43;
    public $preg44;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['tipo'], 'integer'],
            [['username'], 'string', 'max' => 45],
            [['password'], 'string', 'max' => 255],
            [['nombre', 'apellido'], 'string', 'max' => 150],
            [['estiloaprendizaje'], 'string', 'max' => 30],
            [['preg1', 'preg2', 'preg3', 'preg4', 'preg5', 'preg6', 'preg7', 'preg8', 'preg9', 'preg10',
            'preg11', 'preg12', 'preg13', 'preg14', 'preg15', 'preg16', 'preg17', 'preg18', 'preg19', 'preg20',
            'preg21', 'preg22', 'preg23', 'preg24', 'preg25', 'preg26', 'preg27', 'preg28', 'preg29', 'preg30',
            'preg31', 'preg32', 'preg33', 'preg34', 'preg35', 'preg36', 'preg37', 'preg38', 'preg39', 'preg40',
            'preg41', 'preg42', 'preg43', 'preg44', 'fecha'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
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
    public function getAsignaturasDocentes() {
        return $this->hasMany(AsignaturasDocentes::className(), ['usuarios_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGruposAlumnos() {
        return $this->hasMany(GruposAlumnos::className(), ['usuarios_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSentencias() {
        return $this->hasMany(Sentencias::className(), ['usuarios_id' => 'id']);
    }

    public function getNombreCompleto() {
        return $this->apellido . ', ' . $this->nombre;
    }

    public static function getListaDocentes() {
        return yii\helpers\ArrayHelper::map(Usuarios::find()->where(['tipo' => 1])->all(), 'id', 'nombrecompleto');
    }
    
    public static function getListaAlumnos() {
        return yii\helpers\ArrayHelper::map(Usuarios::find()->where(['tipo' => 0])->all(), 'id', 'nombrecompleto');
    }      

    public static function getNombrePorId($id) {
        $objUsuario = static::findOne(['id' => $id]);
        return $objUsuario->apellido . ', ' . $objUsuario->nombre;
    }

    public function getAuthKey(): string {
        return $this->auth_key;
    }

    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($authKey): bool {
        return $this->getAuthKey() === $authKey;
    }

    public static function findIdentity($id) {
        $objUsuario = new Usuarios();
        return $objUsuario->findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null): \yii\web\IdentityInterface {
        throw new \yii\base\NotSupportedException("SÃ³lo se permite logueo por"
        . " nombre de usuario y contraseÃ±a");
    }

    public function beforeSave($insert) {
        $return = parent::beforeSave($insert);
        if ($this->isNewRecord) {
            $this->auth_key = Yii::$app->security->generateRandomString(255);
        }
        if ($this->isAttributeChanged("password")) {
            $this->password = Yii::$app->security->
                    generatePasswordHash($this->password);
        }
        return $return;
    }

}
