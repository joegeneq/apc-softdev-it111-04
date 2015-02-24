<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Appointment */

$this->title = 'Update Appointment: ' . ' ' . $model->AppointmentID;
$this->params['breadcrumbs'][] = ['label' => 'Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->AppointmentID, 'url' => ['view', 'AppointmentID' => $model->AppointmentID, 'VisaType' => $model->VisaType]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="appointment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
