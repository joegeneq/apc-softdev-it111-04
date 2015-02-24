<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppointmentHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Appointment Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-history-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Appointment History', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'HistoryID',
            'PrevAppointmenttDate',
            'PrevAppointmentTime',
            'Appointment_AppointmentID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
