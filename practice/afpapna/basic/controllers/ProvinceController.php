<?php

namespace app\controllers;

use Yii;
use app\models\province;
use app\models\ProvinceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProvinceController implements the CRUD actions for province model.
 */
class ProvinceController extends Controller
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
     * Lists all province models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProvinceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single province model.
     * @param integer $id
     * @param integer $region_id
     * @return mixed
     */
    public function actionView($id, $region_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $region_id),
        ]);
    }

    /**
     * Creates a new province model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new province();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'region_id' => $model->region_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing province model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $region_id
     * @return mixed
     */
    public function actionUpdate($id, $region_id)
    {
        $model = $this->findModel($id, $region_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'region_id' => $model->region_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing province model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $region_id
     * @return mixed
     */
    public function actionDelete($id, $region_id)
    {
        $this->findModel($id, $region_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the province model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $region_id
     * @return province the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $region_id)
    {
        if (($model = province::findOne(['id' => $id, 'region_id' => $region_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
