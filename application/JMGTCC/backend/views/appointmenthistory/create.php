<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AppointmentHistory */

$this->title = 'Create Appointment History';
$this->params['breadcrumbs'][] = ['label' => 'Appointment Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
