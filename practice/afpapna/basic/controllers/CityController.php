<?php

namespace app\controllers;

use Yii;
use app\models\city;
use app\models\CitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CityController implements the CRUD actions for city model.
 */
class CityController extends Controller
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
     * Lists all city models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single city model.
     * @param integer $id
     * @param integer $province_id
     * @return mixed
     */
    public function actionView($id, $province_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $province_id),
        ]);
    }

    /**
     * Creates a new city model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new city();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'province_id' => $model->province_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing city model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $province_id
     * @return mixed
     */
    public function actionUpdate($id, $province_id)
    {
        $model = $this->findModel($id, $province_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'province_id' => $model->province_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing city model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $province_id
     * @return mixed
     */
    public function actionDelete($id, $province_id)
    {
        $this->findModel($id, $province_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the city model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $province_id
     * @return city the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $province_id)
    {
        if (($model = city::findOne(['id' => $id, 'province_id' => $province_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
