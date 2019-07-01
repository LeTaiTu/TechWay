<?php
namespace backend\models;

use \common\models\test\ImageModel;
use Yii;

class Image extends ImageModel
{
	public function getAll(){
		$data = ImageModel::find()->asArray()->all();
		return $data;
	}
}