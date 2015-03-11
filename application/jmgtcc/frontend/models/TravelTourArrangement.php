<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "travel_tour_arrangement".
 *
 * @property integer $id
 * @property string $arrangement_code
 * @property string $destination
 * @property string $departure_date
 * @property string $return_date
 * @property string $airline_name
 * @property string $flight_type
 * @property string $class_type
 * @property integer $number_of_pax
 * @property string $hotel_name
 * @property string $room_type
 * @property string $inclusion
 * @property string $remarks
 * @property string $date_created
 * @property string $status
 * @property string $date_confirmed
 * @property string $confirmed_by
 * @property string $date_updated
 * @property string $updated_by
 * @property integer $user_id
 *
 * @property User $user
 */
class TravelTourArrangement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'travel_tour_arrangement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['destination', 'departure_date', 'return_date', 'number_of_pax', 'room_type', 'user_id'], 'required'],
            [['departure_date', 'return_date', 'date_created', 'date_confirmed', 'date_updated'], 'safe'],
            [['number_of_pax', 'user_id'], 'integer'],
            [['inclusion', 'remarks'], 'string'],
            [['arrangement_code'], 'string', 'max' => 25],
            [['destination', 'airline_name', 'room_type'], 'string', 'max' => 60],
            [['flight_type', 'class_type', 'status', 'confirmed_by', 'updated_by'], 'string', 'max' => 20],
            [['hotel_name'], 'string', 'max' => 100]
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
            'destination' => Yii::t('app', 'Destination'),
            'departure_date' => Yii::t('app', 'Departure Date'),
            'return_date' => Yii::t('app', 'Return Date'),
            'airline_name' => Yii::t('app', 'Airline Name'),
            'flight_type' => Yii::t('app', 'Flight Type'),
            'class_type' => Yii::t('app', 'Class Type'),
            'number_of_pax' => Yii::t('app', 'Number Of Pax'),
            'hotel_name' => Yii::t('app', 'Hotel Name'),
            'room_type' => Yii::t('app', 'Room Type'),
            'inclusion' => Yii::t('app', 'Inclusion'),
            'remarks' => Yii::t('app', 'Remarks'),
            'date_created' => Yii::t('app', 'Date Created'),
            'status' => Yii::t('app', 'Status'),
            'date_confirmed' => Yii::t('app', 'Date Confirmed'),
            'confirmed_by' => Yii::t('app', 'Confirmed By'),
            'date_updated' => Yii::t('app', 'Date Updated'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
