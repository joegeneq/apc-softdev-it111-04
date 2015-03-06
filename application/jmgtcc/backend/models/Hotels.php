<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hotels".
 *
 * @property integer $id
 * @property string $hotel_name
 * @property string $country
 *
 * @property TravelArrangement[] $travelArrangements
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
            [['hotel_name'], 'string', 'max' => 60],
            [['country'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'hotel_name' => Yii::t('app', 'Hotel Name'),
            'country' => Yii::t('app', 'Country'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelArrangements()
    {
        return $this->hasMany(TravelArrangement::className(), ['hotels_id' => 'id']);
    }
}
