<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AppointmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'appointment_code') ?>

    <?= $form->field($model, 'client_name') ?>

    <?= $form->field($model, 'client_username') ?>

    <?= $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'contact_number') ?>

    <?php // echo $form->field($model, 'email_address') ?>

    <?php // echo $form->field($model, 'appointment_date') ?>

    <?php // echo $form->field($model, 'appointment_time') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'visa_type') ?>

    <?php // echo $form->field($model, 'payment_rate') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'confirmed_by') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
