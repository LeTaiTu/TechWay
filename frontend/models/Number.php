<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "numbers".
 *
 * @property int $id
 * @property string $num
 */
class Number extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'numbers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num' => 'Num',
        ];
    }
}
