<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "travel_arrangement".
 *
 * @property integer $id
 * @property string $arrangement_code
 * @property string $departure_date
 * @property string $return_date
 * @property string $place_of_origin
 * @property string $destination
 * @property integer $number_of_adult
 * @property integer $numbrt_of_children
 * @property integer $number_of_infant
 * @property integer $number_of_rooms
 * @property string $hotel_name
 * @property string $star_rating
 * @property string $accommodation
 * @property string $flight_type
 * @property string $cabin_type
 * @property string $tour_type
 * @property string $tour_deals
 * @property string $transport_service
 * @property string $date_created
 * @property string $status
 * @property string $date_confirmed
 * @property string $confirmed_by
 * @property string $date_updated
 * @property string $updated_by
 * @property string $notes
 * @property integer $hotels_id
 * @property integer $airlines_id
 * @property integer $user_id
 *
 * @property Airlines $airlines
 * @property Hotels $hotels
 * @property User $user
 */
class TravelArrangement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'travel_arrangement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departure_date', 'return_date', 'place_of_origin', 'destination', 'number_of_adult', 'flight_type', 'cabin_type', 'tour_type', 'tour_deals', 'transport_service', 'hotels_id', 'airlines_id', 'user_id'], 'required'],
            [['departure_date', 'return_date', 'date_created', 'date_confirmed', 'date_updated'], 'safe'],
            [['number_of_adult', 'numbrt_of_children', 'number_of_infant', 'number_of_rooms', 'hotels_id', 'airlines_id', 'user_id'], 'integer'],
            [['accommodation', 'tour_deals', 'notes'], 'string'],
            [['arrangement_code'], 'string', 'max' => 25],
            [['place_of_origin', 'destination'], 'string', 'max' => 60],
            [['hotel_name'], 'string', 'max' => 100],
            [['star_rating', 'flight_type', 'cabin_type', 'status', 'confirmed_by', 'updated_by'], 'string', 'max' => 20],
            [['tour_type', 'transport_service'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'arrangement_code' => Yii::t('app', 'Arrangement Code'),
            'departure_date' => Yii::t('app', 'Departure Date'),
            'return_date' => Yii::t('app', 'Return Date'),
            'place_of_origin' => Yii::t('app', 'Place Of Origin'),
            'destination' => Yii::t('app', 'Destination'),
            'number_of_adult' => Yii::t('app', 'Number Of Adult'),
            'numbrt_of_children' => Yii::t('app', 'Numbrt Of Children'),
            'number_of_infant' => Yii::t('app', 'Number Of Infant'),
            'number_of_rooms' => Yii::t('app', 'Number Of Rooms'),
            'hotel_name' => Yii::t('app', 'Hotel Name'),
            'star_rating' => Yii::t('app', 'Star Rating'),
            'accommodation' => Yii::t('app', 'Accommodation'),
            'flight_type' => Yii::t('app', 'Flight Type'),
            'cabin_type' => Yii::t('app', 'Cabin Type'),
            'tour_type' => Yii::t('app', 'Tour Type'),
            'tour_deals' => Yii::t('app', 'Tour Deals'),
            'transport_service' => Yii::t('app', 'Transport Service'),
            'date_created' => Yii::t('app', 'Date Created'),
            'status' => Yii::t('app', 'Status'),
            'date_confirmed' => Yii::t('app', 'Date Confirmed'),
            'confirmed_by' => Yii::t('app', 'Confirmed By'),
            'date_updated' => Yii::t('app', 'Date Updated'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'notes' => Yii::t('app', 'Notes'),
            'hotels_id' => Yii::t('app', 'Hotels ID'),
            'airlines_id' => Yii::t('app', 'Airlines ID'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAirlines()
    {
        return $this->hasOne(Airlines::className(), ['id' => 'airlines_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotels()
    {
        return $this->hasOne(Hotels::className(), ['id' => 'hotels_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
