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

    <?php 
        if (Yii::$app->session->hasFlash('travel-notif'))
        {
            print('<div class="alert alert-success">
                        <span class="glyphicon glyphicon-ok" style="font:arial; margin: 0 30px 0 30px"></span>'
                        .Yii::$app->session->getFlash('travel-notif').
                        '</div>');
        }
    ?>

        <div class="arr-main">
            <div class="arr-hdr">
                <img class="arr-img"src="images\logo.png">
                <b class="arr-hdr-label">
                    <?= $model->arrangement_code ?>
                </b>
            </div>
            <div class="arr-hdr-address">
                Upper Ground 12 Cityland Pioneer Condominium 128 Pioneer St., <br>
                Mandaluyong City, Philippines
            </div>
            <div class="arr-content">

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
        </div>

</div>
