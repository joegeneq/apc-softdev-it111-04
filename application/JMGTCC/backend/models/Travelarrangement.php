<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "travelarrangement".
 *
 * @property integer $ArrangementID
 * @property string $DepartureDate
 * @property string $ReturnDate
 * @property string $PlaceOfOrigin
 * @property string $Destination
 * @property integer $NumberOfAdult
 * @property integer $NumberOfChildren
 * @property integer $NumberOfInfant
 * @property integer $NumberOfRooms
 * @property string $HotelName
 * @property string $StarRating
 * @property string $Accommodation
 * @property string $Flight Type
 * @property string $CabinType
 * @property string $TourType
 * @property string $TourDeals
 * @property string $TransportService
 * @property string $DateCreated
 * @property string $Status
 * @property string $DateConfirmed
 * @property string $ConfirmedBy
 * @property string $DateUpdated
 * @property string $UpdatedBy
 * @property integer $Airlines_AirlineID
 * @property integer $Hotels_HotelID
 * @property integer $user_id
 *
 * @property Airlines $airlinesAirline
 * @property Hotels $hotelsHotel
 * @property User $user
 */
class Travelarrangement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'travelarrangement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DepartureDate', 'ReturnDate', 'DateCreated', 'DateConfirmed', 'DateUpdated'], 'safe'],
            [['NumberOfAdult', 'NumberOfChildren', 'NumberOfInfant', 'NumberOfRooms', 'Airlines_AirlineID', 'Hotels_HotelID', 'user_id'], 'integer'],
            [['Accommodation', 'TourDeals'], 'string'],
            [['Airlines_AirlineID', 'Hotels_HotelID', 'user_id'], 'required'],
            [['PlaceOfOrigin', 'Destination', 'HotelName', 'TourType', 'TransportService'], 'string', 'max' => 45],
            [['StarRating', 'Flight Type', 'CabinType', 'Status', 'ConfirmedBy', 'UpdatedBy'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ArrangementID' => 'Arrangement ID',
            'DepartureDate' => 'Departure Date',
            'ReturnDate' => 'Return Date',
            'PlaceOfOrigin' => 'Place Of Origin',
            'Destination' => 'Destination',
            'NumberOfAdult' => 'Number Of Adult',
            'NumberOfChildren' => 'Number Of Children',
            'NumberOfInfant' => 'Number Of Infant',
            'NumberOfRooms' => 'Number Of Rooms',
            'HotelName' => 'Hotel Name',
            'StarRating' => 'Star Rating',
            'Accommodation' => 'Accommodation',
            'Flight Type' => 'Flight  Type',
            'CabinType' => 'Cabin Type',
            'TourType' => 'Tour Type',
            'TourDeals' => 'Tour Deals',
            'TransportService' => 'Transport Service',
            'DateCreated' => 'Date Created',
            'Status' => 'Status',
            'DateConfirmed' => 'Date Confirmed',
            'ConfirmedBy' => 'Confirmed By',
            'DateUpdated' => 'Date Updated',
            'UpdatedBy' => 'Updated By',
            'Airlines_AirlineID' => 'Airlines  Airline ID',
            'Hotels_HotelID' => 'Hotels  Hotel ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAirlinesAirline()
    {
        return $this->hasOne(Airlines::className(), ['AirlineID' => 'Airlines_AirlineID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotelsHotel()
    {
        return $this->hasOne(Hotels::className(), ['HotelID' => 'Hotels_HotelID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
