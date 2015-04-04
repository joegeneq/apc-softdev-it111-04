<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TourArrangement */

$this->title = 'JMGTCC ADMIN';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tour Arrangements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->arrangement_code];
?>
<div class="tour-arrangement-view">

    <div class="view-maintenance">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'arrangement_code',
                'place_of_origin',
                'destination',
                'arrival_date',
                'return_date',
                'number_of_pax',
                'hotel_name',
                'room_type',
                'inclusion_food_deals:ntext',
                'inclusion_freebies:ntext',
                'inclusion_tour_type:ntext',
                'inclusion_transport_service',
                'remarks:ntext',
                'date_created',
                //'user_id',
            ],
        ]) ?>
    </div>

    <div class="maintenance-btn">
        <p>
            <!-- <?= Html::a(Yii::t('app', 'Update'), 
                ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> -->
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>  
    </div>

</div>
