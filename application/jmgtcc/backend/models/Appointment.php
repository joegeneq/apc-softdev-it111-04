<?php

namespace backend\models;

use Yii;
/**
 * This is the model class for table "appointment".
 *
 * @property integer $id
 * @property string $appointment_code
 * @property string $client_name
 * @property string $client_username
 * @property string $city
 * @property string $contact_number
 * @property string $email_address
 * @property string $appointment_date
 * @property string $appointment_time
 * @property string $country
 * @property string $visa_type
 * @property double $payment_rate
 * @property string $date_created
 * @property string $status
 * @property string $confirmed_by
 * @property string $notes
 * @property integer $user_id
 *
 * @property User $user
 * @property AppointmentHistory[] $appointmentHistories
 */
class Appointment extends \yii\db\ActiveRecord
{
    public $minimum_payment = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appointment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_name', 'city', 'contact_number', 'email_address', 'appointment_date', 'appointment_time'], 'required'],
            [['appointment_date', 'appointment_time', 'date_created'], 'safe'],
            [['payment_rate'], 'number'],
            [['notes'], 'string'],
            [['user_id'], 'integer'],
            [['appointment_code'], 'string', 'max' => 25],
            [['client_name', 'country'], 'string', 'max' => 60],
            [['client_username', 'confirmed_by'], 'string', 'max' => 15],
            [['city', 'email_address'], 'string', 'max' => 45],
            [['contact_number', 'status'], 'string', 'max' => 20],
            [['visa_type'], 'string', 'max' => 30],

            [['status'], 'default', 'value'=>'Served'],
            [['payment_rate'], 'required'],
            [['payment_rate'], 'number', 'min'=>1],

            [['confirmed_by'], 'default',  'value'=>yii::$app->user->identity->username]

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'appointment_code' => Yii::t('app', 'Appointment Code'),
            'client_name' => Yii::t('app', 'Client Name'),
            'client_username' => Yii::t('app', 'Client Username'),
            'city' => Yii::t('app', 'City'),
            'contact_number' => Yii::t('app', 'Contact Number'),
            'email_address' => Yii::t('app', 'Email Address'),
            'appointment_date' => Yii::t('app', 'Appointment Date'),
            'appointment_time' => Yii::t('app', 'Appointment Time'),
            'country' => Yii::t('app', 'Country'),
            'visa_type' => Yii::t('app', 'Visa Type'),
            'payment_rate' => Yii::t('app', 'Payment Rate'),
            'date_created' => Yii::t('app', 'Date Created'),
            'status' => Yii::t('app', 'Status'),
            'confirmed_by' => Yii::t('app', 'Confirmed By'),
            'notes' => Yii::t('app', 'Notes'),
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointmentHistories()
    {
        return $this->hasMany(AppointmentHistory::className(), ['appointment_id' => 'id']);
    }

     public function getTime()
    {
        return $this->hasOne(Time::className(), ['time' => 'appointment_time']);
    }
}
