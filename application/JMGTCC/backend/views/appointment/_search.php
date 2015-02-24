<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AppointmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'AppointmentID') ?>

    <?= $form->field($model, 'ClientName') ?>

    <?= $form->field($model, 'ClientUsername') ?>

    <?= $form->field($model, 'City') ?>

    <?= $form->field($model, 'ContactNumber') ?>

    <?php // echo $form->field($model, 'EmailAddress') ?>

    <?php // echo $form->field($model, 'AppointmentDate') ?>

    <?php // echo $form->field($model, 'AppointmentTime') ?>

    <?php // echo $form->field($model, 'VisaType') ?>

    <?php // echo $form->field($model, 'DateCreated') ?>

    <?php // echo $form->field($model, 'ConfirmedBy') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'PaymentRate') ?>

    <?php // echo $form->field($model, 'Message') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
