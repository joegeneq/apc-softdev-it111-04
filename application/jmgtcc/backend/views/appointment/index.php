<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Appointments');

?>
<div class="appointment-index">

    <br>

    <h2> Visa Assistance Appointments </h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <br>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'appointment_code',
            'client_name',
            'appointment_date',

            [
                'attribute'=>'appointment_time',
                'value'=>'time.description'
            ],

            'status',


            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',

            ],
        ],
    ]); ?>

</div>


