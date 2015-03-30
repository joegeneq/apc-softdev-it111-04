<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TourArrangement;
use frontend\models\TourArrangementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TourArrangementController implements the CRUD actions for TourArrangement model.
 */
class TourArrangementController extends Controller
{
    public function behaviors()
    {
        return [	
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all TourArrangement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TourArrangementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TourArrangement model.
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
     * Creates a new TourArrangement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TourArrangement();

        $model->arrangement_code = $model->getArrangementCode($model->arrangement_code);

        if ($model->load(Yii::$app->request->post())) {           
            // TOUR TYPE
            if ($model->inclusion_tour_type == null)
            {
                $model->inclusion_tour_type = 'All tour types available';
            }
            else
            {
                $model->inclusion_tour_type = implode(', ', $model->inclusion_tour_type);
            }

            // TRANSPORT SERVICE
            if ($model->inclusion_transport_service == null)
            {
                $model->inclusion_transport_service = 'All transport services available';
            }
            else
            {
                $model->inclusion_transport_service = implode(', ', $model->inclusion_transport_service);
            }

            // FOOD DEALS
            if ($model->inclusion_food_deals == null)
            {
                $model->inclusion_food_deals = 'All food deals available';
            }
            else
            {
                $model->inclusion_food_deals = implode(', ', $model->inclusion_food_deals);
            }

            // FREEBIES
            if ($model->inclusion_freebies == null)
            {
                $model->inclusion_freebies = 'All freebies available';
            }
            else
            {
                $model->inclusion_freebies = implode(', ', $model->inclusion_freebies);
            }

            if($model->save()) {
                 // SEND EMAIL TO TRAVEL AGENT
                 Yii::$app->mailer->compose()
                ->setFrom([\Yii::$app->params['supportEmail'] => 'JMGTCC'])
                ->setTo('dummyreceiver1@gmail.com')
                ->setSubject('JMGTCC CLIENT TOUR ARRANGEMENT' )
                ->setHtmlBody("<br>
                <div>
                    <img style='padding-top: 10px; padding-left: 20px;' height='50' width='180'
                    src='http://journeysglobaltours.com/wp-content/uploads/2012/11/main_logo.png' >
                    <p style='font-size: 11px; font-family: arial; padding-bottom: 8px; padding-top: 8px; padding-left: 20px;'>
                        Upper Ground 12 Cityland Pioneer Condominium 128 Pioneer St., <br>
                        Mandaluyong City, Philippines
                </p>     
                <p style='font-family:arial; margin-left:5%;'>
                    Listed below are the details of a new Tours Arrangement:
                </p> 
                    <table style='margin-left:10%;font-family: arial;'>
                        <tr>
                            <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Client Name:</b></td>
                            <td>".yii::$app->user->identity->first_name." ".yii::$app->user->identity->last_name."</td>
                        </tr>
                        <tr>
                            <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Contact Number:</b></td>
                            <td>".yii::$app->user->identity->contact_number."</td>
                        </tr>
                        <tr>
                            <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Email Address:</b></td>
                            <td>".yii::$app->user->identity->email."</td>
                        </tr>
                    </table>                   
                </div> 
                <div style='width: 700px; margin-left:5%;'>
                _______________________________________________________________________
                </div>
                <br>
                <div style='width: 500px; margin-left:10%;'>    
                    <b style='font-size: 30px; font-family: arial; float: right; padding-right: 0px; padding-top: 15px;'>
                    ".$model->arrangement_code."</b>    
                    <br><br><br><br>
                    <div style='width: 435px; margin-left:30px; '>
                        
                        <table style='font-family: arial'>
                            <tr>
                                <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Place of Origin:</b></td>
                                <td>".$model->place_of_origin."</td>
                            </tr>
                            <tr>
                                <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Destination:</b></td>
                                <td>".$model->destination."</td>
                            </tr>
                             <tr>
                                <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Arrival Date:</b></td>
                                <td>".$model->arrival_date."</td>
                            </tr>
                            <tr>
                                <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Return Date:</b></td>
                                <td>".$model->return_date."</td>
                            </tr>
                            <tr>
                                <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Number of PAX:</b></td>
                                <td>".$model->number_of_pax."</td>
                            </tr> <tr>
                                <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Hotel Name:</b></td>
                                <td>".$model->hotel_name."</td>
                            </tr> <tr>
                                <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Room Type:</b></td>
                                <td>".$model->room_type."</td>
                            </tr>
                            </tr> <tr>
                                <td width='200px' style='padding-bottom: 5px; padding-top: 5px;'><b>Inclusions:</b></td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>Food: </td>
                                            <td>".$model->inclusion_food_deals."</td>
                                        </tr>
                                        <tr>
                                            <td>Tour Type: </td>
                                            <td>".$model->inclusion_tour_type."</td>
                                        </tr>
                                        <tr>
                                            <td>Transport Services: </td>
                                            <td>".$model->inclusion_transport_service."</td>
                                        </tr>
                                        <tr>
                                            <td>Others: </td>
                                            <td>".$model->inclusion_freebies."</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> 
                            <tr>
                                <td width='200px' style='padding-bottom: 5px; padding-top: 3px;'><b>Remarks:</b></td>
                                <td>".$model->remarks."</td>
                            </tr>
                        </table>
                    </div>
                    <br>
                </div>
            <div style='width: 700px; margin-left:5%;'>
            _______________________________________________________________________
            </div>          
            

            <br><br>

            <div style='margin-left: 5%;'>
                <b style='color:red; font-family: arial; font-size: 18px'>Important Reminders:</b>
                <br>
                <br>
                <ul style='font-family:arial'>
                    <li>Please confirm the travel arrangement of the client as soon as possible</li>
                    <br>
                    <li>For questions or concerns, you may email --- or set a live session with our technical Support Team.</li>
                    <li>Any updates or revisions regarding travel and tour arrangements can be done through email negotiations. </li>
                </ul>

            </div>

            <br><br>
            <br><br>")
                ->send();  
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
        } else {
        
            return $this->render('create', [
                    'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TourArrangement model.
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
     * Deletes an existing TourArrangement model.
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
     * Finds the TourArrangement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TourArrangement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TourArrangement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
