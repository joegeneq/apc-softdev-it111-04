<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "accommodation".
 *
 * @property integer $AccommodationID
 * @property string $AccommodationName
 * @property string $AccommodationDesc
 */
class Accommodation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accommodation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AccommodationDesc'], 'string'],
            [['AccommodationName'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'AccommodationID' => 'Accommodation ID',
            'AccommodationName' => 'Accommodation Name',
            'AccommodationDesc' => 'Accommodation Desc',
        ];
    }
}
