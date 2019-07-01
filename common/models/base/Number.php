<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for collection "number".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $num
 * @property mixed $code_country
 */
class Number extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['mongo', 'number'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'num',
            'code_country',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num', 'code_country'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'num' => 'Num',
            'code_country' => 'Code Country',
        ];
    }
}
