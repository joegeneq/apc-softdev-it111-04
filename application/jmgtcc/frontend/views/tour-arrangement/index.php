<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TourArrangementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tour Arrangements');
?>
<div class="tour-arrangement-index">

    <br>
    <h3> My Tour arrangements </h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Tour Arrangement',
     ]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'arrangement_code',
            'place_of_origin',
            'destination',
            'arrival_date',
            // 'return_date',
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
