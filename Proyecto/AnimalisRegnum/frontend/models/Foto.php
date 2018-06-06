<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "foto".
 *
 * @property int $IdFoto
 * @property string $Ruta
 *
 * @property Animal[] $animals
 * @property User[] $users
 */
class Foto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'foto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Ruta'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdFoto' => 'Id Foto',
            'Ruta' => 'Ruta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnimals()
    {
        return $this->hasMany(Animal::className(), ['IdFoto' => 'IdFoto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['IdFoto' => 'IdFoto']);
    }
}
