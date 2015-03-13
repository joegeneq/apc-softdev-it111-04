<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tour_arrangement".
 *
 * @property integer $id
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
 * @property string $date_created
 * @property string $status
 * @property string $date_confirmed
 * @property string $confirmed_by
 * @property string $date_updated
 * @property string $updated_by
 * @property string $remarks
 * @property integer $user_id
 *
 * @property User $user
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
            [['destination', 'arrival_date', 'return_date', 'number_of_pax', 'room_type', 'user_id'], 'required'],
            [['arrival_date', 'return_date', 'date_created', 'date_confirmed', 'date_updated'], 'safe'],
            [['number_of_pax', 'user_id'], 'integer'],
            [['inclusion_food_deals', 'inclusion_freebies', 'inclusion_tour_type', 'remarks'], 'string'],
            [['place_of_origin', 'destination', 'inclusion_transport_service'], 'string', 'max' => 60],
            [['hotel_name'], 'string', 'max' => 100],
            [['room_type'], 'string', 'max' => 80],
            [['status', 'confirmed_by', 'updated_by'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
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
            'date_created' => Yii::t('app', 'Date Created'),
            'status' => Yii::t('app', 'Status'),
            'date_confirmed' => Yii::t('app', 'Date Confirmed'),
            'confirmed_by' => Yii::t('app', 'Confirmed By'),
            'date_updated' => Yii::t('app', 'Date Updated'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'remarks' => Yii::t('app', 'Remarks'),
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
