<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Appointment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'appointment_code')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'client_name')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'client_username')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'contact_number')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'email_address')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'appointment_date')->textInput() ?>

    <?= $form->field($model, 'appointment_time')->textInput() ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'visa_type')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'payment_rate')->textInput() ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'confirmed_by')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'staff_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
