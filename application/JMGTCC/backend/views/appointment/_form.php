<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Appointment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ClientName')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'ClientUsername')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'City')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'ContactNumber')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'EmailAddress')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'AppointmentDate')->textInput() ?>

    <?= $form->field($model, 'AppointmentTime')->textInput() ?>

    <?= $form->field($model, 'VisaType')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'DateCreated')->textInput() ?>

    <?= $form->field($model, 'ConfirmedBy')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'PaymentRate')->textInput() ?>

    <?= $form->field($model, 'Message')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
