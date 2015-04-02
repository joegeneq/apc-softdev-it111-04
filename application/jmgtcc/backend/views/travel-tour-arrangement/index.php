<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TravelTourArrangementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Travel Tour Arrangements');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="travel-tour-arrangement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'arrangement_code',
            'place_of_origin',
            'destination',
            'departure_date',
            // 'return_date',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
