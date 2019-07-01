<?php
namespace backend\models;

use \common\models\NumberModel;
use Yii;

class Number extends NumberModel
{
	public function getAll(){
		$data = NumberModel::find()->with('image')->asArray()->all();
		return $data;
	}
}