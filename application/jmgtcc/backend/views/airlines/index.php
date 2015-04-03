<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AirlinesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'JMGTCC ADMIN');
$this->params['breadcrumbs'][] = 'Airlines';
?>
<div class="airlines-index">

    <div class="index-hdr">
        <h3> Partner Airlines </h3>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a(Yii::t('app', 'Create new record', [
                'modelClass' => 'Airlines',
            ]), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
   
        <div class="index-maintenance">        
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id',
                    'airline_name',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
   
        </div>

</div>
