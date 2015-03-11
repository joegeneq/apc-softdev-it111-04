<?php

namespace frontend\models;

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
 * @property integer $staff_id
 *
 * @property Staff $staff
 * @property User $user
 * @property AppointmentHistory[] $appointmentHistories
 */
class Appointment extends \yii\db\ActiveRecord
{

    public $appointment_code;
    public $client_username;
    public $client_name;
    public $city;
    public $contact_number;
    public $email_address;


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
            [['user_id', 'staff_id'], 'integer'],
            [['appointment_code'], 'string', 'max' => 25],
            [['client_name', 'country'], 'string', 'max' => 60],
            [['client_username', 'confirmed_by'], 'string', 'max' => 15],
            [['city', 'email_address'], 'string', 'max' => 45],
            [['contact_number', 'status'], 'string', 'max' => 20],
            [['visa_type'], 'string', 'max' => 30]
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
            'staff_id' => Yii::t('app', 'Staff ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(Staff::className(), ['id' => 'staff_id']);
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
}
