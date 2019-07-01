<?php

namespace backend\Models;

use Yii;
use yii\base\Model;
use common\models\User;

class UpdatePass extends Model 
{
	public $userid;
	public $newpass;
	public $renewpass;

	public function rules(){
		return [
			[['userid', 'newpass', 'renewpass'], 'required'],
			[['newpass', 'renewpass'], 'string', 'min' => 6],
			['renewpass', 'compare', 'compareAttribute' => 'newpass']
		];
	}

	public function attributeLabels(){
		return [
			'userid' => 'Username',
			'newpass' => 'New Password',
			'renewpass' => 'Repeat new password',
		];
	}
}