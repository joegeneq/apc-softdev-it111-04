<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TravelArrangement;
use frontend\models\TravelArrangementSearch;
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
     * @param integer $id
     * @param integer $hotels_id
     * @param integer $airlines_id
     * @return mixed
     */
    public function actionView($id, $hotels_id, $airlines_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $hotels_id, $airlines_id),
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
            return $this->redirect(['view', 'id' => $model->id, 'hotels_id' => $model->hotels_id, 'airlines_id' => $model->airlines_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TravelArrangement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $hotels_id
     * @param integer $airlines_id
     * @return mixed
     */
    public function actionUpdate($id, $hotels_id, $airlines_id)
    {
        $model = $this->findModel($id, $hotels_id, $airlines_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'hotels_id' => $model->hotels_id, 'airlines_id' => $model->airlines_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TravelArrangement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $hotels_id
     * @param integer $airlines_id
     * @return mixed
     */
    public function actionDelete($id, $hotels_id, $airlines_id)
    {
        $this->findModel($id, $hotels_id, $airlines_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TravelArrangement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $hotels_id
     * @param integer $airlines_id
     * @return TravelArrangement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $hotels_id, $airlines_id)
    {
        if (($model = TravelArrangement::findOne(['id' => $id, 'hotels_id' => $hotels_id, 'airlines_id' => $airlines_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
