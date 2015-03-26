<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RegistrationForm is the model behind the registration form.
 */
class RegistrationForm extends Model
{
	public $username;
	public $email;
	public $password;
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'username' => 'Логин',
				'email' => 'Почта',
				'password' => 'Пароль'
		);
	}
}