<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tour_arrangement".
 *
 * @property integer $id
 * @property string $destination
 * @property string $arrival_date
 * @property string $departure_date
 * @property integer $number_of_pax
 * @property string $hotel_name
 * @property string $room_type
 * @property string $inclusion
 * @property string $remarks
 * @property integer $hotels_id
 *
 * @property Hotels $hotels
 */
class TourArrangement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tour_arrangement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['destination', 'arrival_date', 'departure_date', 'number_of_pax', 'room_type', 'inclusion', 'hotels_id'], 'required'],
            [['arrival_date', 'departure_date'], 'safe'],
            [['number_of_pax', 'hotels_id'], 'integer'],
            [['inclusion', 'remarks'], 'string'],
            [['destination'], 'string', 'max' => 90],
            [['hotel_name'], 'string', 'max' => 60],
            [['room_type'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'destination' => Yii::t('app', 'Destination'),
            'arrival_date' => Yii::t('app', 'Arrival Date'),
            'departure_date' => Yii::t('app', 'Departure Date'),
            'number_of_pax' => Yii::t('app', 'Number Of Pax'),
            'hotel_name' => Yii::t('app', 'Hotel Name'),
            'room_type' => Yii::t('app', 'Room Type'),
            'inclusion' => Yii::t('app', 'Inclusion'),
            'remarks' => Yii::t('app', 'Remarks'),
            'hotels_id' => Yii::t('app', 'Hotels ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotels()
    {
        return $this->hasOne(Hotels::className(), ['id' => 'hotels_id']);
    }
}
