<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TravelTourArrangement */

$this->title = $model->arrangement_code;
$this->params['breadcrumbs'][] = ['label' => 'Travel Arrangements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->arrangement_code];
?>
<div class="travel-tour-arrangement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'arrangement_code',
            'place_of_origin',
            'destination',
            'departure_date',
            'return_date',
            'airline_name',
            'flight_type',
            'class_type',
            'number_of_pax',
            'hotel_name',
            'room_type',
            'inclusion_food_deals:ntext',
            'inclusion_freebies:ntext',
            'inclusion_tour_type:ntext',
            'inclusion_transport_service',
            'remarks:ntext',
            //'date_created',
            //'status',
            //'user_id',
        ],
    ]) ?>

</div>
