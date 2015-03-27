<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tour_arrangement".
 *
 * @property integer $id
 * @property string $arrangement_code
 * @property string $place_of_origin
 * @property string $destination
 * @property string $arrival_date
 * @property string $return_date
 * @property integer $number_of_pax
 * @property string $hotel_name
 * @property string $room_type
 * @property string $inclusion_food_deals
 * @property string $inclusion_freebies
 * @property string $inclusion_tour_type
 * @property string $inclusion_transport_service
 * @property string $remarks
 * @property string $date_created
 * @property integer $user_id
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
            [['destination', 'arrival_date', 'return_date', 'number_of_pax', 'inclusion_food_deals', 'inclusion_freebies', 'inclusion_tour_type', 'inclusion_transport_service'], 'required'],
            [['arrival_date', 'return_date', 'date_created'], 'safe'],
            [['number_of_pax', 'user_id'], 'integer'],
            [['inclusion_food_deals', 'inclusion_freebies', 'inclusion_tour_type', 'remarks'], 'string'],
            [['arrangement_code'], 'string', 'max' => 25],
            [['place_of_origin', 'destination', 'inclusion_transport_service'], 'string', 'max' => 60],
            [['hotel_name'], 'string', 'max' => 100],
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
            'arrangement_code' => Yii::t('app', 'Arrangement Code'),
            'place_of_origin' => Yii::t('app', 'Place Of Origin'),
            'destination' => Yii::t('app', 'Destination'),
            'arrival_date' => Yii::t('app', 'Arrival Date'),
            'return_date' => Yii::t('app', 'Return Date'),
            'number_of_pax' => Yii::t('app', 'Number Of Pax'),
            'hotel_name' => Yii::t('app', 'Hotel Name'),
            'room_type' => Yii::t('app', 'Room Type'),
            'inclusion_food_deals' => Yii::t('app', 'Inclusion Food Deals'),
            'inclusion_freebies' => Yii::t('app', 'Inclusion Freebies'),
            'inclusion_tour_type' => Yii::t('app', 'Inclusion Tour Type'),
            'inclusion_transport_service' => Yii::t('app', 'Inclusion Transport Service'),
            'remarks' => Yii::t('app', 'Remarks'),
            'date_created' => Yii::t('app', 'Date Created'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }
}
