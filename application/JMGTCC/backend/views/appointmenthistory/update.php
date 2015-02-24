<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AppointmentHistory */

$this->title = 'Update Appointment History: ' . ' ' . $model->HistoryID;
$this->params['breadcrumbs'][] = ['label' => 'Appointment Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->HistoryID, 'url' => ['view', 'id' => $model->HistoryID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="appointment-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
