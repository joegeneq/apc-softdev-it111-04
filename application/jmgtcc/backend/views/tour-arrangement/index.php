<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\TourArrangementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'JMGTCC ADMIN');
$this->params['breadcrumbs'][] = 'Tour Arrangements';
?>
<div class="tour-arrangement-index">

    <h2> Tour Arrangements </h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'arrangement_code',
            'place_of_origin',
            'destination',
            //'arrival_date',

            [
                'attribute' => 'arrival_date',
                'value' => 'arrival_date',
                'options'=> ['class'=>'width-15'],
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'arrival_date',
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

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}'],
        ],
    ]); ?>

</div>
