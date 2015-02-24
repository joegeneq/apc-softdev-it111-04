<?php

namespace backend\controllers;

use Yii;
use backend\models\TravelArrangement;
use backend\models\TravelArrangementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TravelArrangementController implements the CRUD actions for TravelArrangement model.
 */
class TravelArrangementController extends Controller
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
     * Lists all TravelArrangement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TravelArrangementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TravelArrangement model.
     * @param integer $ArrangementID
     * @param integer $Airlines_AirlineID
     * @param integer $Hotels_HotelID
     * @return mixed
     */
    public function actionView($ArrangementID, $Airlines_AirlineID, $Hotels_HotelID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ArrangementID, $Airlines_AirlineID, $Hotels_HotelID),
        ]);
    }

    /**
     * Creates a new TravelArrangement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TravelArrangement();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ArrangementID' => $model->ArrangementID, 'Airlines_AirlineID' => $model->Airlines_AirlineID, 'Hotels_HotelID' => $model->Hotels_HotelID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TravelArrangement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ArrangementID
     * @param integer $Airlines_AirlineID
     * @param integer $Hotels_HotelID
     * @return mixed
     */
    public function actionUpdate($ArrangementID, $Airlines_AirlineID, $Hotels_HotelID)
    {
        $model = $this->findModel($ArrangementID, $Airlines_AirlineID, $Hotels_HotelID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ArrangementID' => $model->ArrangementID, 'Airlines_AirlineID' => $model->Airlines_AirlineID, 'Hotels_HotelID' => $model->Hotels_HotelID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TravelArrangement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ArrangementID
     * @param integer $Airlines_AirlineID
     * @param integer $Hotels_HotelID
     * @return mixed
     */
    public function actionDelete($ArrangementID, $Airlines_AirlineID, $Hotels_HotelID)
    {
        $this->findModel($ArrangementID, $Airlines_AirlineID, $Hotels_HotelID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TravelArrangement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ArrangementID
     * @param integer $Airlines_AirlineID
     * @param integer $Hotels_HotelID
     * @return TravelArrangement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ArrangementID, $Airlines_AirlineID, $Hotels_HotelID)
    {
        if (($model = TravelArrangement::findOne(['ArrangementID' => $ArrangementID, 'Airlines_AirlineID' => $Airlines_AirlineID, 'Hotels_HotelID' => $Hotels_HotelID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
