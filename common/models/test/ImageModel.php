<?php

namespace common\models\test;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $ext
 */
class ImageModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'ext'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'ext' => 'Ext',
        ];
    }
}
