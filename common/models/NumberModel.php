<?php

namespace common\models;

use \common\models\test\Numbers;
use \common\models\test\ImageModel;
use Yii;

class NumberModel extends Numbers {
    public function getImage()
    {
        return $this->hasMany(ImageModel::className(), ['type_id' => 'id'])->andOnCondition(['type' => 'number']);
    }
}