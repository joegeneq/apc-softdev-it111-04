<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hotels".
 *
 * @property integer $HotelID
 * @property string $HotelName
 * @property string $Country
 *
 * @property Travelarrangement[] $travelarrangements
 */
class Hotels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotels';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HotelName'], 'string', 'max' => 60],
            [['Country'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'HotelID' => 'Hotel ID',
            'HotelName' => 'Hotel Name',
            'Country' => 'Country',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelarrangements()
    {
        return $this->hasMany(Travelarrangement::className(), ['Hotels_HotelID' => 'HotelID']);
    }
}
