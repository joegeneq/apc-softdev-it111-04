<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\datepicker\DatePicker;
use backend\models\Airlines;
use backend\models\Hotels;
use backend\models\Inclusion;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\TravelTourArrangement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="travel-tour-arrangement-form">

    <?php $form = ActiveForm::begin(); ?>

       <br><br> 
      <!-- Arrangement Code -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label required-field">Arrangement Code</p>
                 </div>
                <div class="col-lg-3">                   
                    <?= $form->field($model, 'arrangement_code')
                            ->textInput(['maxlength' => 60])
                            ->label(false) ?>
                </div>
            </div>

      <!-- Destination -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Destination</p>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'destination')->textInput(['maxlength' => 60])->label(false) ?>
                </div>
            </div>

     <!-- Departure and Return Date -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Departure Date</p>     
                </div>
                <div class="col-lg-2">         
                    <?= $form->field($model, 'departure_date')
                            ->widget(
                                DatePicker::className(), [
                                    'inline' => false, 
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd',
                                        'daysOfWeekDisabled' => [0,6],
                                        'startDate' => '+1d'
                                    ]])
                            ->label(false) ?>         
                </div>
                <!-- -->
                <div class="col-lg-1">
                    <p class="form-label">Return Date</p>             
                </div>
                <div class="col-lg-2">         
                    <?= $form->field($model, 'return_date')
                     ->widget(
                                DatePicker::className(), [
                                    'inline' => false, 
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd',
                                        'daysOfWeekDisabled' => [0,6],
                                        'startDate' => '+1d'
                                    ]])
                            ->label(false) ?>      
                </div>
            </div>

          <!-- Airline ID/ Airline Name -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Airline</p>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'airlines_id')->dropDownList(              
                    ArrayHelper::map(Airlines::find()->all(),'id','airline_name'),
                    ['prompt'=>'Select Airlines']) ->label(false) ?>
                </div>
            </div>

          <!-- Flight Type -->
             <div class="row">
                 <div class="col-lg-2">
                     <p class="form-label">Flight Type</p> 
                 </div> 
                 <div class="col-lg-3">
                     <?= $form->field($model, 'flight_type')->dropDownList( 
                        ArrayHelper::map($flight = [ 
                            ['id' => '1', 'flight_type' => 'One-Way'],
                            ['id' => '2', 'flight_type' => 'Round Trip'], 
                        ],
                        'id', 'flight_type'), ['prompt'=> 'Select Flight Type']) ->label(false) ?>
                </div>
             </div> 

          <!-- Class Type --> 
            <div class="row">
                <div class="col-lg-2">
                     <p class="form-label">Class Type</p> 
                </div>
                <div class="col-lg-3"> 
                    <?= $form->field($model, 'class_type')->dropDownList( 
                        ArrayHelper::map($class = [ 
                            ['id' => '1', 'class_type' => 'Economy Class'], 
                            ['id' => '2', 'class_type' => 'Business Class'], 
                        ],
                        'id', 'class_type'), ['prompt'=> 'Select Class Type'])->label(false) ?>
                </div>
            </div> 

         <!-- Number of Pax -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Number of Pax</p>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'number_of_pax')->textInput()->label(false) ?>
                </div>
            </div>


         <!-- Hotel ID/Hotel Name --> 
            <div class="row">
                <div class="col-lg-2"> 
                    <p class="form-label">Hotel Name</p> 
                </div> 
                <div class="col-lg-3"> 
                    <?= $form->field($model, 'hotels_id')->dropDownList( 
                        ArrayHelper::map(Hotels::find()->all(),'id', 'hotel_name'), 
                        ['prompt'=>'Select Hotel'])->label(false) ?>
                </div>
            </div> 

         <!-- Room Type -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Room Type</p>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'room_type')->dropDownList(
                        ArrayHelper::map($roomType = [
                            ['id' => '1', 'room_type' => 'Single'], 
                            ['id' => '2', 'room_type' => 'Twin'],
                            ['id' => '3', 'room_type' => 'Triple'],],
                            'id', 'room_type'), ['prompt'=> 'Select Room Type'])->label(false) ?>
                </div>
            </div>
        
         <!-- Inclusion -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Inclusion</p>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'inclusion')->radioList(              
                        ArrayHelper::map(Inclusion::find()->all(),'id','inclusion_description'))->label(false) ?>
                </div>
            </div>

         <!-- Remarks -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Remarks</p>
                </div>
                <div class="col-lg-4">
                     <?= $form->field($model, 'remarks')->textarea(['rows' => 5]) ->label(false) ?>
                </div>
            </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <!--
     <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'date_confirmed')->textInput() ?>

    <?= $form->field($model, 'confirmed_by')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'date_updated')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'airlines_id')->textInput() ?>

    <?= $form->field($model, 'hotels_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>
    -->
    <?php ActiveForm::end(); ?>

</div>
