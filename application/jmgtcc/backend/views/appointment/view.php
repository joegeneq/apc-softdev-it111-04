<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Appointment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appointments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-view">

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
            'id',
            'appointment_code',
            'client_name',
            'client_username',
            'city',
            'contact_number',
            'email_address:email',
            'appointment_date',
            'appointment_time',
            'country',
            'visa_type',
            'payment_rate',
            'date_created',
            'status',
            'confirmed_by',
            'notes:ntext',
            'user_id',
            'staff_id',
        ],
    ]) ?>

</div>
