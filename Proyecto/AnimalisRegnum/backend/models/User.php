<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $Curp
 * @property string $Nombre
 * @property string $ApPat
 * @property string $ApMat
 * @property string $Direccion
 * @property string $Tel
 * @property string $FechaN
 * @property string $FechaR
 * @property int $IdStatus
 * @property int $IdFoto
 * @property int $IdMunicipio
 * @property int $IdEstado
 * @property int $IdSexo
 *
 * @property Animal[] $animals
 * @property Estados $estado
 * @property Foto $foto
 * @property Municipios $municipio
 * @property Sexo $sexo
 * @property Status $status0
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'Curp', 'Nombre', 'ApPat', 'ApMat', 'Direccion', 'Tel', 'FechaN', 'FechaR', 'IdStatus', 'IdFoto', 'IdMunicipio', 'IdEstado', 'IdSexo'], 'required'],
            [['status', 'created_at', 'updated_at', 'IdStatus', 'IdFoto', 'IdMunicipio', 'IdEstado', 'IdSexo'], 'integer'],
            [['FechaN', 'FechaR'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['Curp'], 'string', 'max' => 18],
            [['Nombre'], 'string', 'max' => 30],
            [['ApPat', 'ApMat'], 'string', 'max' => 25],
            [['Direccion'], 'string', 'max' => 100],
            [['Tel'], 'string', 'max' => 13],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['Curp'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['IdEstado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['IdEstado' => 'IdEstado']],
            [['IdFoto'], 'exist', 'skipOnError' => true, 'targetClass' => Foto::className(), 'targetAttribute' => ['IdFoto' => 'IdFoto']],
            [['IdMunicipio'], 'exist', 'skipOnError' => true, 'targetClass' => Municipios::className(), 'targetAttribute' => ['IdMunicipio' => 'IdMunicipio']],
            [['IdSexo'], 'exist', 'skipOnError' => true, 'targetClass' => Sexo::className(), 'targetAttribute' => ['IdSexo' => 'IdSexo']],
            [['IdStatus'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['IdStatus' => 'IdStatus']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'Curp' => 'Curp',
            'Nombre' => 'Nombre',
            'ApPat' => 'Ap Pat',
            'ApMat' => 'Ap Mat',
            'Direccion' => 'Direccion',
            'Tel' => 'Tel',
            'FechaN' => 'Fecha N',
            'FechaR' => 'Fecha R',
            'IdStatus' => 'Id Status',
            'IdFoto' => 'Id Foto',
            'IdMunicipio' => 'Id Municipio',
            'IdEstado' => 'Id Estado',
            'IdSexo' => 'Id Sexo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnimals()
    {
        return $this->hasMany(Animal::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estados::className(), ['IdEstado' => 'IdEstado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFoto()
    {
        return $this->hasOne(Foto::className(), ['IdFoto' => 'IdFoto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio()
    {
        return $this->hasOne(Municipios::className(), ['IdMunicipio' => 'IdMunicipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSexo()
    {
        return $this->hasOne(Sexo::className(), ['IdSexo' => 'IdSexo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Status::className(), ['IdStatus' => 'IdStatus']);
    }
}
