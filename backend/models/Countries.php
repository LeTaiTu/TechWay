<?php

namespace backend\models;

use \common\models\test\Country;
use Yii;

/**
 * Description of AuthItem *
 * @author longnt
 */
class Countries extends Country {
	public function getAll(){
		$data = Country::find()
		-> asArray()
		-> all();
		return $data;
	}
}