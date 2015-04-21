<?php

namespace backend\controllers;

use Yii;
use backend\models\Appointment;
use backend\models\AppointmentReport;
use backend\models\AppointmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\User;

/**
 * AppointmentController implements the CRUD actions for Appointment model.
 */
class AppointmentController extends Controller
{
    public function behaviors()
    {
        return [
        		'access' => [
        				'class' => AccessControl::className(),
        				'rules' => [
        						[
    								'actions' => ['login', 'error'],
    								'allow' => true,
        						],
        						[
    								'actions' => ['logout', 'index', 'view', 'update'],
    								'allow' => true,
    								'roles' => ['@'],
    								'matchCallback' => function ($rule, $action) {
    									return User::isUserAdmin(Yii::$app->user->identity->username);
    								}
        						],
        						],
        				],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
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
        $model = new AppointmentReport();
        
        if($model->load(Yii::$app->request->post()))
        {
        	if( $model->getFromDate() > $model->getToDate() )
        	{
        		//Send message notif if email was sent  successfully
        		Yii::$app->session->setFlash('notif', 'Error sending report. From date should be less than to date.');
        		
        	}
        	else 
        	{
        		$totalRecords = Appointment::find()
        		->where('appointment_date >= :fromDate and appointment_date <= :toDate')
        		->andWhere('appointment_date >= :fromDate', [':fromDate' => $model->getFromDate()])
        		->andWhere('appointment_date <= :toDate', [':toDate' => $model->getToDate()])
        		->andWhere("status = 'Served'")
        		->count();
        		 
        		$profit = $totalRecords * 1000;
        		 
        		Yii::$app->mailer->compose()
        		->setFrom([\Yii::$app->params['supportEmail'] => 'JMGTCC'])
        		->setTo('dummyreceiver1@gmail.com')
        		->setSubject('JMGTCC VISA APPOINTMENT REPORT' )
        		->setHtmlBody("
                <br>
                <p style='font-family:arial; margin-left:5%;'>
                <br><br>
                    Greetings from the JMGTCC Management. <br>
                    Below are the details of your Visa Assistance Appointment Report from ".$model->getFromDate()." to ".$model->getToDate().":
                </p>
                <br>
     
                <div style='border: 1px solid black; width: 500px; margin-left:10%;'>
                <div>
                    <img style='padding-top: 10px; padding-left: 20px;' height='50' width='180'
                    src='http://journeysglobaltours.com/wp-content/uploads/2012/11/main_logo.png' >
                </div>
                <p style='font-size: 11px; font-family: arial; padding-bottom: 8px; padding-top: 8px; padding-left: 20px;'>
                        Upper Ground 12 Cityland Pioneer Condominium 128 Pioneer St., <br>
                        Mandaluyong City, Philippines
                </p>
                <div style='width: 435px; margin-left:30px; '>
                    <table style='font-family: arial'>
                        <tr>
                            <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>From:</b></td>
                            <td>".$model->getFromDate()."</td>
                        </tr>
                    	<tr>
                            <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>To:</b></td>
                            <td>".$model->getToDate()."</td>
                        </tr>
                    	<tr>
                            <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Total Number of Appointments:</b></td>
                            <td>".$totalRecords."</td>
                        </tr>
                        <tr>
                            <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Total:</b></td>
                            <td>Php ".$profit."</td>
                        </tr>
                    </table>
                </div>
            </div>
     
            <br><br>
            <b style='font-family:arial; color:#3B8215'>Thank you for using the JMGTCC Travel Arrangement & Appointment System!</b>
            <br><br>
     
            ")
        		             
        	->send();
        	
        	//Send message notif if email was sent  successfully
        	Yii::$app->session->setFlash('notif', 'Report successfully sent.');
        	}
        	
        	
        	      	
        	return $this->redirect(['index', 'model' => $model]); 
	
        }
        else 
        {
	        return $this->render('index', [
	        			'searchModel' => $searchModel,
	        			'dataProvider' => $dataProvider,
	        			'model'=>$model
	        	]);
        }
        
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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
