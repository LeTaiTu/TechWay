<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;
use common\models\test\ImageModel;

class UploadForm extends Model
{
	//up load và lưu ảnh vào thư mục
	public $imageFiles;

	public function rules()
	{
		return [
			[['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png, gif', 'maxFiles' => 10],
		];
	}

	public function upload($id = '', $type = '')
	{
		if ($this->validate()) {
			$old = ImageModel::findAll(['type_id'=> $id,'type' => $type]);
			if ($old) {
				foreach ($old as $img) {
					$path = \Yii::getAlias("@webroot/storages/images/{$type}/") .$img->name;
					@unlink($path);
				}
			}	
			ImageModel::deleteAll(['type_id' => $id, 'type' => $type]);
			foreach ($this->imageFiles as $file) {
				$name = md5($type . '-' . $id . $file->tempName).'.'.$file->extension;
				$file->saveAs("storages/images/$type/".$name);
				$image = new ImageModel();
				$image->type_id = $id;
				$image->type = $type;
				$image->name = $name;
				$image->ext = $file->extension;
				$image->insert();
			}
			return true;
		} else {
			return false;
		}
		
	}
}