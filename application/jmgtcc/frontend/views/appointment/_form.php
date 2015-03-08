<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use dosamigos\datepicker\DatePicker;
use backend\models\Time;

/* @var $this yii\web\View */
/* @var $model frontend\models\Appointment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-form">

    <?php $form = ActiveForm::begin(); ?>
      
    <br>
        
        <div class="form-container-main">

            <!-- CLIENT NAME -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label">Client Name</p>
                 </div>
                <div class="col-lg-6">                   
                    <?= $form->field($model, 'client_name')->textInput(['maxlength' => 60])->label(false) ?>
                </div>
            </div>

            <!-- CITY -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label">City</p>
                </div>
                <div class="col-lg-6">                   
                        <?= $form->field($model, 'city')->textInput(['maxlength' => 45])->label(false) ?>
                </div>
            </div>
            
            <!-- CONTACT NUMBER -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label">Contact Number</p>
                 </div>
                <div class="col-lg-6">                   
                    <?= $form->field($model, 'contact_number')->textInput(['maxlength' => 20])->label(false) ?>
                </div>
            </div>

            <!-- EMAIL ADDRESS -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label">Email Address</p>
                 </div>
                <div class="col-lg-6">                   
                   <?= $form->field($model, 'email_address')->textInput(['maxlength' => 45])
                   ->input(email)
                   ->label(false) ?>
                </div>
            </div>

            <!-- VISA TYPE -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label">Visa Type</p>
                 </div>
                <div class="col-lg-6">                   
                    <?= $form->field($model, 'visa_type')->textInput(['maxlength' => 15])->label(false) ?>
                </div>
            </div>

            <!-- APPOINTMENT DATE -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label">Appointment Date</p>
                 </div>
                <div class="col-lg-6">                   
                     <?= $form->field($model, 'appointment_date')->widget(
                        DatePicker::className(), [
                            'inline' => false, 
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'MM-dd-yyyy',
                                'daysOfWeekDisabled' => [0,6],
                                'startDate' => '+1d'
                            ]
                    ])->label(false);?>
                </div>
            </div>

            <!-- APPOINTMENT TIME -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label">Appointment Time</p>
                 </div>
                <div class="col-lg-2">                   
                   <?= $form->field($model, 'appointment_time')->radioList(                        
                        ArrayHelper::map(Time::find()->all(),'id','time')
                        )
                   ->label(false);
                    ?>
                </div>
            </div>
            
            <!-- NOTES -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label">Notes</p>
                 </div>
                <div class="col-lg-6">                   
                    <?= $form->field($model, 'notes')->textarea(['rows' => 6])->label(false) ?>
                </div>
            </div>

            <br>

            <!-- SUBMIT BUTTON -->
            <div class="form-group">
                <div class="btn-form-create">
                    <?= Html::submitButton($model->isNewRecord ? 
                        Yii::t('app', 'Create') : Yii::t('app', 'Update'), 
                        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <a href="frontend/web/index.php?r=site%2Findex">
                        <button class="btn btn-default">Cancel</button>
                    </a>
                </div>
            </div>

    </div>    

     <?= Html::activeHiddenInput($model, 'appointment_code', ['value' => 'Appntmnt Code']) ?> 
     <?= Html::activeHiddenInput($model, 'client_username') ?>    
     <?= Html::activeHiddenInput($model, 'payment_rate') ?> 
     <?= Html::activeHiddenInput($model, 'date_created') ?> 
     <?= Html::activeHiddenInput($model, 'status',['value' => 'For Approval']) ?> 
     <?= Html::activeHiddenInput($model, 'confirmed_by') ?>     
     <?= Html::activeHiddenInput($model, 'user_id') ?> 
     <?= Html::activeHiddenInput($model, 'staff_id') ?> 

    <?php ActiveForm::end(); ?>

</div>