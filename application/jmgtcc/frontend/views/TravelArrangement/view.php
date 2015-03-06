<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TravelArrangement */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Travel Arrangements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="travel-arrangement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id, 'hotels_id' => $model->hotels_id, 'airlines_id' => $model->airlines_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id, 'hotels_id' => $model->hotels_id, 'airlines_id' => $model->airlines_id], [
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
            'id',
            'arrangement_code',
            'departure_date',
            'return_date',
            'place_of_origin',
            'destination',
            'number_of_adult',
            'numbrt_of_children',
            'number_of_infant',
            'number_of_rooms',
            'hotel_name',
            'star_rating',
            'accommodation:ntext',
            'flight_type',
            'cabin_type',
            'tour_type',
            'tour_deals:ntext',
            'transport_service',
            'date_created',
            'status',
            'date_confirmed',
            'confirmed_by',
            'date_updated',
            'updated_by',
            'notes:ntext',
            'hotels_id',
            'airlines_id',
            'user_id',
        ],
    ]) ?>

</div>
