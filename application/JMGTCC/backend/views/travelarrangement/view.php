<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TravelArrangement */

$this->title = $model->ArrangementID;
$this->params['breadcrumbs'][] = ['label' => 'Travel Arrangements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="travel-arrangement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ArrangementID' => $model->ArrangementID, 'Airlines_AirlineID' => $model->Airlines_AirlineID, 'Hotels_HotelID' => $model->Hotels_HotelID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ArrangementID' => $model->ArrangementID, 'Airlines_AirlineID' => $model->Airlines_AirlineID, 'Hotels_HotelID' => $model->Hotels_HotelID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ArrangementID',
            'DepartureDate',
            'ReturnDate',
            'PlaceOfOrigin',
            'Destination',
            'NumberOfAdult',
            'NumberOfChildren',
            'NumberOfInfant',
            'NumberOfRooms',
            'HotelName',
            'StarRating',
            'Accommodation:ntext',
            'Flight Type',
            'CabinType',
            'TourType',
            'TourDeals:ntext',
            'TransportService',
            'DateCreated',
            'Status',
            'DateConfirmed',
            'ConfirmedBy',
            'DateUpdated',
            'UpdatedBy',
            'Airlines_AirlineID',
            'Hotels_HotelID',
            'user_id',
        ],
    ]) ?>

</div>
