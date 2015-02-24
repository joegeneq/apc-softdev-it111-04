<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TravelArrangementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Travel Arrangements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="travel-arrangement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Travel Arrangement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ArrangementID',
            'DepartureDate',
            'ReturnDate',
            'PlaceOfOrigin',
            'Destination',
            // 'NumberOfAdult',
            // 'NumberOfChildren',
            // 'NumberOfInfant',
            // 'NumberOfRooms',
            // 'HotelName',
            // 'StarRating',
            // 'Accommodation:ntext',
            // 'Flight Type',
            // 'CabinType',
            // 'TourType',
            // 'TourDeals:ntext',
            // 'TransportService',
            // 'DateCreated',
            // 'Status',
            // 'DateConfirmed',
            // 'ConfirmedBy',
            // 'DateUpdated',
            // 'UpdatedBy',
            // 'Airlines_AirlineID',
            // 'Hotels_HotelID',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
