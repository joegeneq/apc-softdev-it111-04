<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use dosamigos\datepicker\DatePicker;
use backend\models\Time;
use yii\captcha\Captcha;


/* @var $this yii\web\View */
/* @var $model frontend\models\Appointment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-form">

    <?php $form = ActiveForm::begin(); ?>
      
    <?php 
        if (Yii::$app->user->isGuest)
        {
            print('<br>');
        }
    ?>
        
        <div class="form-container-main">

            <h3>Set an Appointment</h3>
            <p>Please fill out the following fields to set an appointment:</p>
            <br>

            <!-- CLIENT NAME -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label required-field">Complete Name</p>
                 </div>
                <div class="col-lg-6">                   
                    <?php 
                        if (Yii::$app->user->isGuest)
                        {
                            echo $form->field($model, 'client_name')
                                    ->textInput(['maxlength' => 60])
                                    ->label(false);                    
                        } else {  
                            $firstname = yii::$app->user->identity->first_name;
                            $lastname = yii::$app->user->identity->last_name;
                            $completename = $firstname.' '.$lastname;                      
                            echo $form->field($model, 'client_name')
                                ->textInput(
                                    ['value'=>$completename,
                                     'readonly'=>'true'])
                                ->label(false);                    
                        }?>
                </div>
            </div>

            <!-- CITY -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label required-field">City</p>
                </div>
                <div class="col-lg-6">    
                    <?php 
                        if (Yii::$app->user->isGuest)
                        {
                            echo $form->field($model, 'city')
                                    ->textInput(['maxlength' => 45])
                                    ->label(false);                  
                        } else {    
                            $city = yii::$app->user->identity->city;                    
                            echo $form->field($model, 'city')
                                ->textInput(
                                    ['value'=>$city,
                                     'readonly'=>'true'])
                                ->label(false);                    
                        }?>
                </div>
            </div>
            
            <!-- CONTACT NUMBER -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label required-field">Contact Number</p>
                 </div>
                <div class="col-lg-6">  
                    <?php 
                        if (Yii::$app->user->isGuest)
                        {
                            echo $form->field($model, 'contact_number')
                                    ->textInput(['maxlength' => 20])
                                    ->label(false);                  
                        } else {  
                            $contactnumber = yii::$app->user->identity->contact_number;                      
                            echo $form->field($model, 'contact_number')
                                ->textInput(
                                    ['value'=>$contactnumber,
                                     'readonly'=>'true'])
                                ->label(false);                    
                        }?>                 
                </div>
            </div>

            <!-- EMAIL ADDRESS -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label required-field">Gmail Address:</p>
                 </div>
                <div class="col-lg-6">   
                    <?php 
                        if (Yii::$app->user->isGuest)
                        {
                            echo $form->field($model, 'email_address')
                                    ->textInput(['maxlength' => 45, 'pattern' => '[^]*@gmail\.com$'])
                                    ->label(false);                  
                        } else {   
                            $email = yii::$app->user->identity->email;                     
                            echo $form->field($model, 'email_address')
                                ->textInput(
                                    ['value'=>$email,
                                     'readonly'=>'true', 'pattern' => '[^]*@gmail\.com$'])
                                ->label(false);                    
                        }?> 
                </div>
            </div>

            <br>
            <div class="arrangement-division"><b class="division-label">Visa Description</b></div>
            <br>

            <!-- COUNTRY -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label">Country</p>
                 </div>
                <div class="col-lg-6">                   
                    <?= $form->field($model, 'country')
                            ->textInput(['maxlength' => 60])
                            ->label(false);  ?>
                </div>
            </div>
           
            <!-- VISA TYPE -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label">Visa Type</p>
                 </div>
                <div class="col-lg-6">                   
                    <?= $form->field($model, 'visa_type')
                            ->dropdownList([ 'Not specified' => ' - ',
                                            'Immigrant Visa' => 'Immigrant Visa',
                                            'Non-Immigrant Visa' => 'Non-Immigrant Visa'])
                            ->label(false); ?>
                </div>
            </div>

            <!-- APPOINTMENT DATE -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label required-field">Appointment Date</p>
                 </div>
                <div class="col-lg-6">                   
                    <?= $form->field($model, 'appointment_date')
                            ->widget(
                                DatePicker::className(), [
                                    'inline' => false, 
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd',
                                        'daysOfWeekDisabled' => [0,6],
                                        'startDate' => '+1d'
                                    ]], ['onchange'=>'alert("123")'])
                            ->label(false);?>
                </div>
            </div>

            <!-- APPOINTMENT TIME -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label required-field">Appointment Time</p>
                </div>
                <div class="col-lg-2" id="appointmentTime">  
                    <?= $form->field($model, 'appointment_time')->radioList(  
                            ArrayHelper::map(Time::find()  
                                //->where(['id'=>'1'])                       
                                ->all(),'time','time'))                        
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
                    <?= $form->field($model, 'notes')->textarea(['rows' => 6])
                            ->label(false); ?>
                </div>
            </div>

			<!-- CAPTCHA -->
			 <div class="row">
				 <div class="col-lg-3">
                    <p class="form-label">Verification Code</p>
                 </div>
			 <div class="col-lg-6">   
				<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
							'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
							]) ->label(false);?>
			 </div>
            </div>
            <br>

            <!-- SUBMIT BUTTON -->
            <div class="form-group">
                <div class="btn-form-create">
                    <?= Html::submitButton($model->isNewRecord ? 
                        Yii::t('app', 'Set an Appointment') : Yii::t('app', 'Update'), 
                        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    
                    <?php 
                        if (Yii::$app->user->isGuest) {                        
                            echo Html::a('Cancel', ['/site/index'], 
                                    ['class' => 'btn btn-danger']);      
                        } else { 
                            echo Html::a('Cancel', ['/appointment/index'], 
                                    ['class' => 'btn btn-danger']);
                        } ?>

                </div>                
            </div>
        </div>    

    <?php 
        if (Yii::$app->user->isGuest)
        {
			
            echo Html::activeHiddenInput($model, 'client_username'); 
            echo Html::activeHiddenInput($model, 'user_id');  

				
        } else {        
            echo Html::activeHiddenInput($model, 'client_username',
                    ['value'=>yii::$app->user->identity->username]);
            echo Html::activeHiddenInput($model, 'user_id',
                    ['value'=>yii::$app->user->identity->id]);
        }?>

    <?= Html::activeHiddenInput($model, 'appointment_code') ?>
    <?= Html::activeHiddenInput($model, 'payment_rate') ?> 
    <?= Html::activeHiddenInput($model, 'date_created') ?> 
    <?= Html::activeHiddenInput($model, 'status') ?> 
    <?= Html::activeHiddenInput($model, 'confirmed_by') ?>   

    <br>  

    <?php ActiveForm::end(); ?>

</div>