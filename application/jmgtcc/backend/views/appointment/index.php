<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Appointments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Appointment',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'appointment_code',
            'client_name',
            'client_username',
            'city',
            // 'contact_number',
            // 'email_address:email',
            // 'appointment_date',
            // 'appointment_time',
            // 'country',
            // 'visa_type',
            // 'payment_rate',
            // 'date_created',
            // 'status',
            // 'confirmed_by',
            // 'notes:ntext',
            // 'user_id',
            // 'staff_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
