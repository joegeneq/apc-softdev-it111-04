<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TravelTourArrangementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'JMGTCC ADMIN');
$this->params['breadcrumbs'][] = 'Travel & Tour Arrangements';
?>
<div class="travel-tour-arrangement-index">

   <h2> Travel & Tour Arrangements </h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'arrangement_code',
            'place_of_origin',
            'destination',

            //'departure_date',

            [
                'attribute' => 'departure_date',
                'value' => 'departure_date',
                'options'=> ['class'=>'width-15'],
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'departure_date',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                        ]
                ]),
            ],

            //'return_date',

            [
                'attribute' => 'return_date',
                'value' => 'return_date',
                'options'=> ['class'=>'width-15'],
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'return_date',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                        ]
                ]),
            ],

            // 'airline_name',
            // 'flight_type',
            // 'class_type',
            // 'number_of_pax',
            // 'hotel_name',
            // 'room_type',
            // 'inclusion_food_deals:ntext',
            // 'inclusion_freebies:ntext',
            // 'inclusion_tour_type:ntext',
            // 'inclusion_transport_service',
            // 'remarks:ntext',
            // 'date_created',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>

</div>
