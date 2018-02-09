<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "correo".
 *
 * @property int $idcorreo
 * @property string $usuario
 * @property string $email
 */
class Correo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'correo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcorreo', 'usuario', 'email'], 'required'],
            [['idcorreo'], 'integer'],
            [['usuario', 'email'], 'string', 'max' => 45],
            [['idcorreo'], 'unique'],
        [['email'],'email']];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcorreo' => 'Idcorreo',
            'usuario' => 'Usuario',
            'email' => 'Email',
        ];
    }
}
