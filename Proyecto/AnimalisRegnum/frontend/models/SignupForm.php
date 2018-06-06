<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $Curp;
    public $Nombre;
    public $ApPat;
    public $ApMat;
    public $Direccion;
    public $Tel;
    public $FechaR;
    public $FechaN;
    public $IdStatus;
    public $IdEstado;
    public $IdMunicipio;
    public $IdSexo;
    public $IdFoto;
    public $Foto;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['Curp', 'required'],
            ['Curp', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This curp has already been taken.'],
            ['Curp', 'string', 'min'=>18,'max' => 18],
            ['Curp','match','pattern'=>"/^([a-z]{4})([0-9]{6})([a-z]{6})([0-9]{2})$/i"],
            ['Nombre', 'required'],
            ['Nombre', 'string','max' => 30],
            ['ApPat', 'required'],
            ['ApPat', 'string','max' => 25],
            ['ApMat', 'required'],
            ['ApMat', 'string','max' => 25],
            ['Direccion', 'required'],
            ['Direccion', 'string','max' => 100],
            ['Tel', 'required'],
            ['Tel','string','min'=>13,'max' => 13],
            ['Tel', 'integer'],
            ['FechaN', 'required'],
            ['IdSexo', 'required'],
            ['IdEstado', 'required'],
            ['IdMunicipio', 'required'],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['Foto', 'required'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */

     public function attributeLabels()
    {
        return [
          'username'=>'Username',
          'Curp'=>'Curp',
          'Nombre'=>'Name',
          'ApPat'=>'Last name',
          'ApMat'=>"Mother's last name",
          'IdSexo'=>'Sex',
          'IdEstado'=>'State',
          'IdMunicipio'=>'Municipality',
          'Direccion'=>'Address',
          'Tel'=>'CelPhone',
          'FechaN'=>'Birthdate',
          'FechaR'=>'Registration date',
          'Foto'=>'Photo'




        ];
    }

    public function signup()
    {
         if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->Curp=$this->Curp;
        $user->email=$this->email;
        $user->Nombre=$this->Nombre;
        $user->ApPat=$this->ApPat;
        $user->ApMat=$this->ApMat;
        $user->Direccion=$this->Direccion;
        $user->Tel=$this->Tel;
        $user->FechaN=date("Y-m-d", strtotime($this->FechaN));
        $user->FechaR=date('Y-m-d');
        $user->IdStatus=1;
        $user->IdEstado=$this->IdEstado;
        $user->IdMunicipio=$this->IdMunicipio;
        $user->IdSexo=$this->IdSexo;
        $user->IdFoto=1;
        $user->Foto=$this->Foto;
        
        return $user->save() ? $user : null;
    }
}
