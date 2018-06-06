<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "animal".
 *
 * @property int $idAnimal
 * @property string $Nombre
 * @property string $FechaR
 * @property int $IdTipo
 * @property int $IdStatus
 * @property int $IdCategoria
 * @property int $IdSexo
 * @property int $IdFoto
 * @property int $user_id
 *
 * @property Categoria $categoria
 * @property Foto $foto
 * @property Sexo $sexo
 * @property Status $status
 * @property Tipo $tipo
 * @property User $user
 */
class Animal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'animal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'IdTipo', 'IdSexo','Foto'], 'required'],
            [['FechaR'], 'safe'],
            [['IdTipo','IdSexo'], 'integer'],
            [['Nombre'], 'string', 'max' => 30],
            [['IdCategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['IdCategoria' => 'IdCategoria']],
            [['IdSexo'], 'exist', 'skipOnError' => true, 'targetClass' => Sexo::className(), 'targetAttribute' => ['IdSexo' => 'IdSexo']],
            [['IdTipo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['IdTipo' => 'IdTipo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idAnimal' => 'Id Animal',
            'Nombre' => 'Name',
            'FechaR' => 'Fecha R',
            'IdTipo' => 'Kind',
            'IdStatus' => 'Status',
            'IdCategoria' => 'Category',
            'IdSexo' => 'Sex',
            'IdFoto' => 'Id Photo',
            'user_id' => 'User ID',
            'foto'=>'Photo'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['IdCategoria' => 'IdCategoria']);
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
    public function getSexo()
    {
        return $this->hasOne(Sexo::className(), ['IdSexo' => 'IdSexo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['IdStatus' => 'IdStatus']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(Tipo::className(), ['IdTipo' => 'IdTipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
