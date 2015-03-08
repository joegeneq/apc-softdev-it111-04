<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TravelArrangementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Travel Arrangements');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="travel-arrangement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Travel Arrangement',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'arrangement_code',
            'departure_date',
            'return_date',
            'place_of_origin',
            // 'destination',
            // 'number_of_adult',
            // 'numbrt_of_children',
            // 'number_of_infant',
            // 'number_of_rooms',
            // 'hotel_name',
            // 'star_rating',
            // 'accommodation:ntext',
            // 'flight_type',
            // 'cabin_type',
            // 'tour_type',
            // 'tour_deals:ntext',
            // 'transport_service',
            // 'date_created',
            // 'status',
            // 'date_confirmed',
            // 'confirmed_by',
            // 'date_updated',
            // 'updated_by',
            // 'notes:ntext',
            // 'hotels_id',
            // 'airlines_id',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
