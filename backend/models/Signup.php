<?php

namespace backend\models;

use backend\models\UserModel;
use \common\models\User;

class Signup extends UserModel
{
	public $username;
	public $email;
	public $password;
	public $repassword;

	public function rules(){
		return [
			['username', 'trim'],
			['username', 'required'],
			['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.', 'message' => 'This username has already been taken.'], //Trỏ đến model User
			['username', 'string', 'min' => 2, 'max' => 255],
			['email', 'trim'],
			['email', 'required'],
			['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
			['email', 'string', 'max' => 255],
			['email', 'email'],
			['password', 'required'],
			['password', 'string', 'min' => 6],
			['repassword', 'required'],
			['repassword', 'string', 'min' => 6],
			['repassword', 'compare', 'compareAttribute' => 'password'],
		];
	}

	public function signup() {
		$user = new User();
		$user->username = $this->username;
		$user->email = $this->email;
		$user->setPassword($this->password);
		$user->generateAuthKey();
		$user->generateEmailVerificationToken();
		$user->created_at = time();
		return $user->save();
	}
}