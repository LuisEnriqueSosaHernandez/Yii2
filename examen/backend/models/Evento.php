<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "evento".
 *
 * @property int $idAsistente
 * @property string $NombreAsistente
 * @property string $FechaNacimiento
 * @property int $Edad
 * @property string $Correo
 * @property int $Tel
 * @property string $Organizacion
 * @property int $Estado
 * @property int $Ciudad
 * @property double $Ingresos
 */
class Evento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NombreAsistente', 'FechaNacimiento', 'Edad','Correo', 'Tel', 'Organizacion', 'Estado', 'Ciudad'], 'required'],
            [['Correo'],'email'],
            [['FechaNacimiento'], 'safe'],
            [[ 'Tel'], 'integer'],
            [['Edad'],'integer','max' =>50, 'min'=> 18],
            [['Tel'],'string','max' =>10, 'min'=> 10],
            [['Ingresos'], 'string','max' => 5],
            [['NombreAsistente', 'Organizacion'], 'string', 'max' => 90],
            [['Correo'], 'string', 'max' => 255],
            [['Estado','Ciudad'],'string','max' =>50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idAsistente' => 'Id Asistente',
            'NombreAsistente' => 'Nombre Asistente',
            'FechaNacimiento' => 'Fecha Nacimiento',
            'Edad' => 'Edad',
            'Correo' => 'Correo',
            'Tel' => 'Tel',
            'Organizacion' => 'Organizacion',
            'Estado' => 'Estado',
            'Ciudad' => 'Ciudad',
            'Ingresos' => 'Ingresos',
        ];
    }
}
