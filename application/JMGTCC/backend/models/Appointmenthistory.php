<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "appointmenthistory".
 *
 * @property integer $HistoryID
 * @property string $PrevAppointmenttDate
 * @property string $PrevAppointmentTime
 * @property integer $Appointment_AppointmentID
 *
 * @property Appointment $appointmentAppointment
 */
class Appointmenthistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appointmenthistory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PrevAppointmenttDate', 'PrevAppointmentTime'], 'safe'],
            [['Appointment_AppointmentID'], 'required'],
            [['Appointment_AppointmentID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'HistoryID' => 'History ID',
            'PrevAppointmenttDate' => 'Prev Appointmentt Date',
            'PrevAppointmentTime' => 'Prev Appointment Time',
            'Appointment_AppointmentID' => 'Appointment  Appointment ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointmentAppointment()
    {
        return $this->hasOne(Appointment::className(), ['AppointmentID' => 'Appointment_AppointmentID']);
    }
}
