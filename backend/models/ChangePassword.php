<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

class ChangePassword extends Model
{
	public $oldpassword;
	public $newpassword;
	public $renewpassword;

	public function rules(){
		return [
			[['oldpassword', 'newpassword', 'renewpassword'], 'required'],
			['oldpassword', 'valiPass'],
			[['newpassword', 'renewpassword'], 'string', 'min' => 6],
			['renewpassword', 'compare', 'compareAttribute' => 'newpassword'], //So sánh 
			//['renewpassword', 'compare', 'compareValue' => '123456', 'operator' => '>=', 'type' => 'string'] So sánh với chuỗi 123456 theo toán tử opertor và kiểu dữ liệu string
		];
	}

	public function valiPass($attribute, $params){
		$hash = User::findIdentity(Yii::$app->user->identity->id)->password_hash; //Lấy pass_hash của id ra
		if (!Yii::$app->security->validatePassword($this->oldpassword, $hash)) { //So sánh pass
			$this->addError($attribute, 'Mật khẩu sai'); //Nếu ko trùng pass cũ sẽ in ra thông báo
		}

	}

	public function attibuteLabels(){
		[
			'oldpassword' => 'Mật khẩu hiện tại',
			'newpassword' => 'Mật khẩu mới',
			'renewpassword' => 'Nhập lại mật khẩu',
		];
	}
}