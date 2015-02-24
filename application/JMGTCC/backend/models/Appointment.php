<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "appointment".
 *
 * @property integer $AppointmentID
 * @property string $ClientName
 * @property string $ClientUsername
 * @property string $City
 * @property string $ContactNumber
 * @property string $EmailAddress
 * @property string $AppointmentDate
 * @property string $AppointmentTime
 * @property string $VisaType
 * @property string $DateCreated
 * @property string $ConfirmedBy
 * @property string $Status
 * @property double $PaymentRate
 * @property string $Message
 * @property integer $user_id
 *
 * @property User $user
 * @property Appointmenthistory[] $appointmenthistories
 */
class Appointment extends \yii\db\ActiveRecord
{
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
            [['AppointmentDate', 'AppointmentTime', 'DateCreated'], 'safe'],
            [['VisaType', 'user_id'], 'required'],
            [['PaymentRate'], 'number'],
            [['Message'], 'string'],
            [['user_id'], 'integer'],
            [['ClientName', 'City', 'EmailAddress'], 'string', 'max' => 45],
            [['ClientUsername', 'VisaType', 'ConfirmedBy', 'Status'], 'string', 'max' => 15],
            [['ContactNumber'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'AppointmentID' => 'Appointment ID',
            'ClientName' => 'Client Name',
            'ClientUsername' => 'Client Username',
            'City' => 'City',
            'ContactNumber' => 'Contact Number',
            'EmailAddress' => 'Email Address',
            'AppointmentDate' => 'Appointment Date',
            'AppointmentTime' => 'Appointment Time',
            'VisaType' => 'Visa Type',
            'DateCreated' => 'Date Created',
            'ConfirmedBy' => 'Confirmed By',
            'Status' => 'Status',
            'PaymentRate' => 'Payment Rate',
            'Message' => 'Message',
            'user_id' => 'User ID',
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
    public function getAppointmenthistories()
    {
        return $this->hasMany(Appointmenthistory::className(), ['Appointment_AppointmentID' => 'AppointmentID']);
    }
}
