<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tipo".
 *
 * @property int $IdTipo
 * @property string $Tipo
 *
 * @property Animal[] $animals
 */
class Tipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Tipo'], 'required'],
            [['Tipo'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdTipo' => 'Id Tipo',
            'Tipo' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnimals()
    {
        return $this->hasMany(Animal::className(), ['IdTipo' => 'IdTipo']);
    }
}
