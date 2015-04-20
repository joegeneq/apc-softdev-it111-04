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
 *
 * @property User $user
 * @property AppointmentHistory[] $appointmentHistories
 */
class Appointment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 
	public $verifyCode;
	
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
            [['client_name'], 'required'],
            [['client_name'], 'string', 'max' => 60],
            [['client_name'], 'filter', 'filter' => 'trim'],

            //[['client_username'], 'default', 'value' => yii::$app->user->identity->username],

            [['city'], 'required'],
            [['city'], 'string', 'max' => 45],
            [['city'], 'filter', 'filter' => 'trim'],

            [['contact_number'], 'required'],
            //[['contact_number'], 'string', 'max' => 20],
            [['contact_number'], 'integer', 'message' => 'Contact number must be valid.'],
            [['contact_number'], 'filter', 'filter' => 'trim'],

            [['email_address'], 'required'],
            [['email_address'], 'string', 'max' => 45],
            [['email_address'], 'filter', 'filter' => 'trim'],
            [['email_address'], 'email'],

            [['appointment_date'], 'required'],
            [['appointment_date'], 'filter', 'filter' => 'trim'],
            [['appointment_date'], 'safe'],

            [['appointment_time'], 'required'],
            [['appointment_time'], 'filter', 'filter' => 'trim'],
            [['appointment_time'], 'string', 'max' => 10],

            [['country'], 'string', 'max' => 60],
            [['country'], 'filter', 'filter' => 'trim'],
            [['visa_type'], 'string', 'max' => 30],
            [['country', 'visa_type'], 'default', 'value' => 'Not specified'],    

            [['status'], 'string', 'max' => 20],

            [['client_username', 'confirmed_by'], 'string', 'max' => 15],            
            [['date_created'], 'safe'],
            [['payment_rate'], 'number'],
            [['notes'], 'string'],

            //[['user_id'], 'integer'],
            //[['user_id'], 'default', 'value' => yii::$app->user->identity->id],
            [['user_id'], 'default', 'value' => null],    

            [['appointment_code'], 'string', 'max' => 25],
			
			   
			['verifyCode', 'captcha'],
			[['verifyCode'], 'default', 'value' => null], 

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
			//'verifyCode' => Yii::t('app', 'Verification Code'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    //Generate Appointment Code
    public static function getAppointmentCode($data)
    {
        $connection = \Yii::$app->db;
        $model = $connection
            ->createCommand("SELECT CONCAT('VA', RIGHT(CAST(YEAR(NOW()) AS CHAR(4)),2), 
                                RIGHT(CONCAT('00', MONTH(NOW())), 2), 
                                '-', 
                                RIGHT( CONCAT('00000', COALESCE(MAX(id),0)+1 ) , 6)) AS appointment_code 
                                FROM appointment
                                WHERE YEAR(date_created) = YEAR(NOW())
                            ");

        $data = $model->queryScalar();
        return $data;
    }

    //Update Appointment Status
    public static function updateAppointmentStatus($prevAppointmentCode)
    {
        $connection = \Yii::$app->db;
                $model = $connection
                    ->createCommand("UPDATE appointment
                                        SET status = 'Cancelled'
                                        WHERE user_id = ".yii::$app->user->identity->id."
                                         AND appointment_code = '".$prevAppointmentCode."'
                                         AND status != 'Served'
                                         ORDER BY id DESC
                                        LIMIT 1
                                    ");

        //$userID = yii::$app->user->identity->id;        
        $affected_rows = $model->execute();

        if ($affected_rows > 0)
        {
            return true;
        } else {
            return false;
        }
    }

    //Update Appointment Status For Guest
    public static function updateAppointmentStatusForGuest($prevAppointmentCode)
    {
        $connection = \Yii::$app->db;
                $model = $connection
                    ->createCommand("UPDATE appointment
                                        SET status = 'Cancelled'
                                        WHERE appointment_code = '".$prevAppointmentCode."'
                                         AND status != 'Served'
                                         ORDER BY id DESC
                                        LIMIT 1
                                    ");
      
        $affected_rows = $model->execute();

        if ($affected_rows >= 0)
        {
            return true;
        } else {
            return false;
        }
    }

    //Get Previous Appointment Code
    public static function getPreviousAppointmentCode($data)
    {
        $connection = \Yii::$app->db;
                $model = $connection
                    ->createCommand("SELECT appointment_code
                                        FROM appointment
                                        WHERE user_id = ".yii::$app->user->identity->id."
                                        ORDER BY id DESC
                                        LIMIT 1
                                    ");

        $data = $model->queryScalar();
        return $data;
    }

    //Get Previous Appointment Code For Guest
    public static function getPreviousAppointmentCodeForGuest($client_name, $contact_number, $email_address)
    {
        $connection = \Yii::$app->db;
                $model = $connection
                    ->createCommand("SELECT appointment_code 
                                        FROM appointment 
                                        WHERE client_name='".$client_name."' 
                                        AND contact_number='".$contact_number."' 
                                        AND email_address='".$email_address."' 
                                        ORDER BY id DESC 
                                        LIMIT 1
                                    ");

        $data = $model->queryScalar();        
        return $data;               
    }

}
