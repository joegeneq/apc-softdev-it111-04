<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AppointmentHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PrevAppointmenttDate')->textInput() ?>

    <?= $form->field($model, 'PrevAppointmentTime')->textInput() ?>

    <?= $form->field($model, 'Appointment_AppointmentID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
