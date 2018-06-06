<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "municipios".
 *
 * @property int $IdMunicipio
 * @property string $Nombre
 * @property int $IdEstado
 *
 * @property Estados $estado
 * @property User[] $users
 */
class Municipios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'municipios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'IdEstado'], 'required'],
            [['IdEstado'], 'integer'],
            [['Nombre'], 'string', 'max' => 30],
            [['Nombre'],'unique'],
            [['IdEstado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['IdEstado' => 'IdEstado']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdMunicipio' => 'Id Municipaly',
            'Nombre' => 'Name',
            'IdEstado' => 'Id State',
        ];
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
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['IdMunicipio' => 'IdMunicipio']);
    }
}
