<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tour_arrangement".
 *
 * @property integer $id
 * @property string $destination
 * @property string $departure_date
 * @property string $return_date
 * @property string $airline_name
 * @property string $flight_type
 * @property string $class_type
 * @property integer $number_of_pax
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
            [['destination', 'departure_date', 'return_date', 'number_of_pax', 'user_id'], 'required'],
            [['departure_date', 'return_date'], 'safe'],
            [['number_of_pax', 'user_id'], 'integer'],
            [['remarks'], 'string'],
            [['destination', 'airline_name'], 'string', 'max' => 60],
            [['flight_type', 'class_type'], 'string', 'max' => 20]
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
            'departure_date' => Yii::t('app', 'Departure Date'),
            'return_date' => Yii::t('app', 'Return Date'),
            'airline_name' => Yii::t('app', 'Airline Name'),
            'flight_type' => Yii::t('app', 'Flight Type'),
            'class_type' => Yii::t('app', 'Class Type'),
            'number_of_pax' => Yii::t('app', 'Number Of Pax'),
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
