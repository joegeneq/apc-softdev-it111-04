<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Appointment */

$this->title = 'JMGTCC ADMIN';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appointments'), 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;

$this->params['breadcrumbs'][] = ['label' => $model->appointment_code];

?>
<div class="appointment-view">

   <div class="appointment-update">

        <?= $this->render('_formview', [
            'model' => $model,
        ]) ?>


    </div>

</div>
