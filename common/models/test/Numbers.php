<?php

namespace common\models\test;

use Yii;
use \common\models\test\ImageModel;
/**
 * This is the model class for table "number".
 *
 * @property int $id
 * @property string $num
 * @property string $code_country
 * @property string $image
 */
class Numbers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'number';
    }

    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['num'], 'string', 'max' => 15],
            [['code_country'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num' => 'Mã',
            'code_country' => 'Code Country',
        ];
    }

}
