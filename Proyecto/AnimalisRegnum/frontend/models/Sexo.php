<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sexo".
 *
 * @property int $IdSexo
 * @property string $Sexo
 *
 * @property Animal[] $animals
 * @property User[] $users
 */
class Sexo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sexo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Sexo'], 'required'],
            [['Sexo'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdSexo' => 'Id Sexo',
            'Sexo' => 'Sex',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnimals()
    {
        return $this->hasMany(Animal::className(), ['IdSexo' => 'IdSexo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['IdSexo' => 'IdSexo']);
    }
}
