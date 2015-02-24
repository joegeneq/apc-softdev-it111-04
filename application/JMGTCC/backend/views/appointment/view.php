<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Appointment */

$this->title = $model->AppointmentID;
$this->params['breadcrumbs'][] = ['label' => 'Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'AppointmentID' => $model->AppointmentID, 'VisaType' => $model->VisaType], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'AppointmentID' => $model->AppointmentID, 'VisaType' => $model->VisaType], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'AppointmentID',
            'ClientName',
            'ClientUsername',
            'City',
            'ContactNumber',
            'EmailAddress:email',
            'AppointmentDate',
            'AppointmentTime',
            'VisaType',
            'DateCreated',
            'ConfirmedBy',
            'Status',
            'PaymentRate',
            'Message:ntext',
            'user_id',
        ],
    ]) ?>

</div>
