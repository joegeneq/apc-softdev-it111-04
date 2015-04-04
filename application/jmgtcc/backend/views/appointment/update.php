<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Appointment */

$this->title = 'JMGTCC ADMIN';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appointments'), 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = Yii::t('app', 'Update');

$this->params['breadcrumbs'][] = ['label' => $model->appointment_code];

?>
<div class="appointment-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
