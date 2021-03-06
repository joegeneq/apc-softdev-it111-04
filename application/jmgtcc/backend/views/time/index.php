<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TimeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'JMGTCC ADMIN');
$this->params['breadcrumbs'][] = 'Appointment Time';
?>
<div class="time-index">

    <div class="index-hdr">
        <h3> Appointment Time </h3>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a(Yii::t('app', 'Create new record', [
                'modelClass' => 'Time',
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
                'time',
                //'description',

                [
                    'attribute' =>  'description',
                    'value' =>  'description',
                    'options'=> ['class'=>'width-60'],
                    'filter' => false,                    
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        </div>
    
</div>
