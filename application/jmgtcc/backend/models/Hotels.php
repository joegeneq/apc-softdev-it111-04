<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hotels".
 *
 * @property integer $id
 * @property string $hotel_name
 * @property string $country
 * @property string $star_rating
 *
 * @property TourArrangement $tourArrangement
 * @property TravelTourArrangement[] $travelTourArrangements
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
            [['hotel_name', 'country'], 'required'],
            [['hotel_name'], 'string', 'max' => 60],
            [['country', 'star_rating'], 'string', 'max' => 45]
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
            'star_rating' => Yii::t('app', 'Star Rating'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTourArrangement()
    {
        return $this->hasOne(TourArrangement::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelTourArrangements()
    {
        return $this->hasMany(TravelTourArrangement::className(), ['hotels_id' => 'id']);
    }
}
