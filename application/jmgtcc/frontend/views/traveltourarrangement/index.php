<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TravelTourArrangementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Travel Tour Arrangements');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="travel-tour-arrangement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Travel Tour Arrangement',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'arrangement_code',
            'destination',
            'departure_date',
            'return_date',
            // 'flight_type',
            // 'class_type',
            // 'number_of_pax',
            // 'hotel_name',
            // 'room_type',
            // 'inclusion:ntext',
            // 'remarks:ntext',
            // 'date_created',
            // 'status',
            // 'date_confirmed',
            // 'confirmed_by',
            // 'date_updated',
            // 'updated_by',
            // 'hotels_id',
            // 'airlines_id',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
