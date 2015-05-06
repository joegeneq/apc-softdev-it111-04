<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Appointment;
use frontend\models\AppointmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;

use yii\mail\BaseMailer;
use yii\filters\AccessControl;

/**
 * AppointmentController implements the CRUD actions for Appointment model.
 */
class AppointmentController extends Controller
{

    public $checkQuery;
    public $prevAppointmentCode;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                            [
                                'actions' => ['create', 'view'],
                                'allow' => true,
                            ],
                            [
                                'actions' => ['index'],
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                            [
                                'actions' => ['update'],
                                'allow' => false,
                                'roles' => ['@'],            
                            ],
                        ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
					'captcha' => [
							'class' => 'yii\captcha\CaptchaAction',
							'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
					],
                ],
            ],
			
        ];
    }

    /**
     * Lists all Appointment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppointmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Appointment model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Appointment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Appointment();
        //$model->appointment_code = $model->getAppointmentCode($model->appointment_code);

        if ($model->load(Yii::$app->request->post())) 
        {   
            if (Yii::$app->user->isGuest) {
                $prevAppointmentCode = $model->getPreviousAppointmentCodeForGuest($model->client_name, $model->contact_number, $model->email_address);
            } else {
                $prevAppointmentCode = $model->getPreviousAppointmentCode($model->appointment_code);
            }

            $model->appointment_code = $model->getAppointmentCode($model->appointment_code);     
            
            if ($model->save()) 
            { 
                Yii::$app->mailer->compose()
                    ->setFrom([\Yii::$app->params['supportEmail'] => 'JMGTCC'])
                    ->setTo($model->email_address)
                    ->setSubject('JMGTCC VISA APPOINTMENT CLIENT REFERENCE' )
                    ->setHtmlBody("
                        <br>
                        <p style='font-family:arial; margin-left:5%;'>
                            Hello, ".$model->client_name."!
                        <br><br>
                            Greetings from the JMGTCC Management. <br>
                            Below are the details of your Visa Consultation Appointment schedule:
                        </p>
                        <br>

                        <div style='border: 1px solid black; width: 500px; margin-left:10%;'>
                        <div>
                            <img style='padding-top: 10px; padding-left: 20px;' height='50' width='180'
                            src='http://journeysglobaltours.com/wp-content/uploads/2012/11/main_logo.png' >
                            <b style='font-size: 30px; font-family: arial; float: right; padding-right: 50px; padding-top: 15px;'>
                                ".$model->appointment_code."</b>
                        </div>       
                        <p style='font-size: 11px; font-family: arial; padding-bottom: 8px; padding-top: 8px; padding-left: 20px;'>
                                Upper Ground 12 Cityland Pioneer Condominium 128 Pioneer St., <br>
                                Mandaluyong City, Philippines
                        </p>            
                        <div style='width: 435px; margin-left:30px; '>
                            <table style='font-family: arial'>
                                <tr>
                                    <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Appointment Date</b></td>
                                    <td>".$model->appointment_date."</td>
                                </tr>
                                <tr>
                                    <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Appointment Time</b></td>
                                    <td>".$model->appointment_time."</td>
                                </tr>
                                 <tr>
                                    <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Country</b></td>
                                    <td>".$model->country."</td>
                                </tr>
                                <tr>
                                    <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Visa Type</b></td>
                                    <td>".$model->visa_type."</td>
                                </tr>
                                <tr>
                                    <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Notes</b></td>
                                    <td>".$model->notes."</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <br><br>

                    <div style='margin-left: 5%;'>
                        <b style='color:red; font-family: arial; font-size: 18px'>Important Reminders:</b>
                        <br>
                        <hr width='600'>
                        <br>
                        <ul style='font-family:arial'>
                            <li>Please be at the JMGTCC Office <b>15 minutes</b> before your appointment time.</li>
                            <li>Please take note of the <b>Appointment Reference Number</b> and you <b>Appointment Date & Time</b>.</li>
                            <li>Clients without the necessary references will not be entertained.</li>
                        <br>
                            <li>For questions or concerns, you may email <i>inquiry@journeysglobaltours.com</i> or set a live session with our technical Support Team.</li>
                        </ul>

                    </div>

                    <br><br>

                    <b style='font-family:arial; color:#3B8215'>Thank you for using the JMGTCC Travel Arrangement & Appointment System!</b>
                    <br><br>

                    ")
                ->send();

                if ($prevAppointmentCode != null)
                {
                    if (Yii::$app->user->isGuest) {
                        $checkQuery = $model->updateAppointmentStatusForGuest($prevAppointmentCode);
                    } else {
                        $checkQuery = $model->updateAppointmentStatus($prevAppointmentCode);
                    }
                    
                    if ($checkQuery == true)
                    {
                        Yii::$app->session->setFlash('appointmentNotif', 
                            '  Your previous Visa Consultation Appointment with Appointment Code '
                            .$prevAppointmentCode.' has been cancelled.');                    
                    }
                }           
               
               return $this->redirect(['view', 'id' => $model->id]);
                
            }

        } else {
		
			
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Appointment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Appointment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Appointment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Appointment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Appointment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
