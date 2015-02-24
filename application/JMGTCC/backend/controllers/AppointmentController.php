<?php

namespace backend\controllers;

use Yii;
use backend\models\Appointment;
use backend\models\AppointmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AppointmentController implements the CRUD actions for Appointment model.
 */
class AppointmentController extends Controller
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
     * @param integer $AppointmentID
     * @param string $VisaType
     * @return mixed
     */
    public function actionView($AppointmentID, $VisaType)
    {
        return $this->render('view', [
            'model' => $this->findModel($AppointmentID, $VisaType),
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
            return $this->redirect(['view', 'AppointmentID' => $model->AppointmentID, 'VisaType' => $model->VisaType]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Appointment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $AppointmentID
     * @param string $VisaType
     * @return mixed
     */
    public function actionUpdate($AppointmentID, $VisaType)
    {
        $model = $this->findModel($AppointmentID, $VisaType);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'AppointmentID' => $model->AppointmentID, 'VisaType' => $model->VisaType]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Appointment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $AppointmentID
     * @param string $VisaType
     * @return mixed
     */
    public function actionDelete($AppointmentID, $VisaType)
    {
        $this->findModel($AppointmentID, $VisaType)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Appointment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $AppointmentID
     * @param string $VisaType
     * @return Appointment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($AppointmentID, $VisaType)
    {
        if (($model = Appointment::findOne(['AppointmentID' => $AppointmentID, 'VisaType' => $VisaType])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
