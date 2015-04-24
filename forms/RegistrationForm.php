<?php

namespace app\forms;

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
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
				// username and password are both required
				[['username', 'email', 'password'], 'required'],
				// email is validated by validateEmail()
				['username', 'validateUsername'],
				// email is validated by validateEmail()
				['email', 'validateEmail'],
				// password is validated by validatePassword()
				['password', 'validatePassword'],
		];
	}
	
	/**
	 * Validates the username.
	 * This method serves as the inline validation for username.
	 *
	 * @param string $attribute the attribute currently being validated
	 * @param array $params the additional name-value pairs given in the rule
	 */
	public function validateUsername($attribute, $params)
	{
		if (!$this->hasErrors()) {
			$user = User::findByUsername($this->username);
			if ($user){
				$this->addError($attribute, 'Пользователь с таким логином уже зарегистрирован.');
			}
		}
	}
	
	/**
	 * Validates the password.
	 * This method serves as the inline validation for password.
	 *
	 * @param string $attribute the attribute currently being validated
	 * @param array $params the additional name-value pairs given in the rule
	 */
	public function validatePassword($attribute, $params)
	{
		if (!$this->hasErrors()) {
			
		}
	}
	
	/**
	 * Validates the email.
	 * This method serves as the inline validation for password.
	 *
	 * @param string $attribute the attribute currently being validated
	 * @param array $params the additional name-value pairs given in the rule
	 */
	public function validateEmail($attribute, $params)
	{
		if (!$this->hasErrors()) {
			if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
				$this->addError($attribute, 'Неверный формат почты.');
			}
			$user = User::findByEmail($this->email);
			if ($user){
				$this->addError($attribute, 'Пользователь с такой почтой уже зарегистрирован.');
			}
		}
	}
	
	/**
	 * Registration a user using the provided username, email and password.
	 * @return boolean whether the user is logged in successfully
	 */
	public function registration()
	{
		if ($this->validate()) {
			$user = new User();
			$user->username = $this->username;
			$user->email = $this->email;
			$user->password = $this->password;
			return $user->save();
		} else {
			return false;
		}
	}
	
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