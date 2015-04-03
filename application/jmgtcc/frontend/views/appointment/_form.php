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
                    <?= $form->field($model, 'client_name')
                            ->textInput(['maxlength' => 60])
                            ->label(false)
                    ?>
                </div>
            </div>

            <!-- CITY -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label required-field">City</p>
                </div>
                <div class="col-lg-6">                   
                        <?= $form->field($model, 'city')
                                ->textInput(['maxlength' => 45])
                                ->label(false) ?>
                </div>
            </div>
            
            <!-- CONTACT NUMBER -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label required-field">Contact Number</p>
                 </div>
                <div class="col-lg-6">                   
                    <?= $form->field($model, 'contact_number')
                            ->textInput(['maxlength' => 20])
                            ->label(false) ?>
                </div>
            </div>

            <!-- EMAIL ADDRESS -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label required-field">Email Address</p>
                 </div>
                <div class="col-lg-6">                   
                    <?= $form->field($model, 'email_address')
                            ->textInput(['maxlength' => 45])
                            ->label(false) ?>
                </div>
            </div>

            <hr class="faded">

            <!-- COUNTRY -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label">Country</p>
                 </div>
                <div class="col-lg-6">                   
                    <?= $form->field($model, 'country')
                            ->textInput(['maxlength' => 60])
                            ->label(false)  ?>
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
                            ->label(false) ?>
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
                                    ]],
                                    ['name'=>'appointment_date'])
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
                        array(['id'=>'appointment_time']),
                            ArrayHelper::map(Time::find()  
                                //->where(['id'=>'1'])                       
                                ->all(),'time','time'))                        
                            ->label(false);
                    ?>     
                </div>
            </div>

<?php
    $script = <<< JS
         //ALL JAVASCRIPT CODES
          $("input[name='appointment_date']").change(function(){
              if($(this).val() == null)
              {
                //$("#appointmentTime").hide();
                alert("sss");
            }
            //  } else {
            //     $("#textBox_hotel").val('');
            //     $("#textBox_hotel").hide(); 
            // }
      });        
JS;
    $this -> registerJS($script);
?>

        <script>
            function showHint(str) {
                if (str.length == 0 || str == null) { 
                    //document.getElementById("appointmentTime").hide();
                    //return;
                    alert("111");
                } else {
                     var xmlhttp = new XMLHttpRequest();
                     xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                             document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "gethint.php?q="+str, true);
                    xmlhttp.send();
                }
            }
        </script>

         <script >
            // $(document).ajaxStart(function () {
            //     $("#results").children().remove();
            //     $trans = $('#translations').val();
            //     if ($trans == 'fil') {
            //       var msg = '<h1>Mangyaring maghintay...</h1>';
            //     } else {
            //       var msg = '<h1>Please wait...</h1>';
            //     };
            //     $("#results").append(msg);
            // });
        </script>

            
            <!-- NOTES -->
            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label">Notes</p>
                 </div>
                <div class="col-lg-6">                   
                    <?= $form->field($model, 'notes')->textarea(['rows' => 6])
                            ->label(false) ?>
                </div>
            </div>

            <br>

            <!-- SUBMIT BUTTON -->
            <div class="form-group">
                <div class="btn-form-create">
                    <?= Html::submitButton($model->isNewRecord ? 
                        Yii::t('app', 'Set an Appointment') : Yii::t('app', 'Update'), 
                        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>                
            </div>

    </div>    

     <?= Html::activeHiddenInput($model, 'appointment_code') ?> 
     <?= Html::activeHiddenInput($model, 'client_username') ?>    
     <?= Html::activeHiddenInput($model, 'payment_rate') ?> 
     <?= Html::activeHiddenInput($model, 'date_created') ?> 
     <?= Html::activeHiddenInput($model, 'status') ?> 
     <?= Html::activeHiddenInput($model, 'confirmed_by') ?>     
     <?= Html::activeHiddenInput($model, 'user_id') ?>  

    <?php ActiveForm::end(); ?>

</div>