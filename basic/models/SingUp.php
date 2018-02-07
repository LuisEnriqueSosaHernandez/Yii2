<?php
namespace app\models;

use Yii;
use yii\base\Model;

class SingUp extends Model
{
	public $first_name;
	public $last_name;
	public $email;
	public $company;
	public $role;
	public $country;
	public $prog_lengauge;
	public $rcv_inf;
	//etiquetas
	public function attributeLabels(){
		return ['first_name'=>'Your first name',
				'last_name'=>'Your last name',
				'email'=>'Your email address',
				'company'=>'Your company',
				'role'=>'Your role in the company',
				'country'=>'Your country',
				'prog_lengauge'=>'Programming lenguage',
				'rcv_inf'=>'I wish to recive more info'];
	}
	//validaciones
	public function rules()
    {
        return [
            [['first_name', 'last_name','email'], 'required'],
            ['email', 'email']
        ];
    }
}
