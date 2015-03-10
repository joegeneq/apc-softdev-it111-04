<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TourArrangementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tour Arrangements');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-arrangement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Tour Arrangement',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'destination',
            'arrival_date',
            'departure_date',
            'number_of_pax',
            // 'hotel_name',
            // 'room_type',
            // 'inclusion:ntext',
            // 'remarks:ntext',
            // 'hotels_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
