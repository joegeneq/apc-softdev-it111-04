<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

use dosamigos\datepicker\DatePicker;
use backend\models\FoodDeals;
use backend\models\Freebies;
use backend\models\TourType;
use backend\models\TransportService;
use backend\models\Airlines;

/* @var $this yii\web\View */
/* @var $model frontend\models\TravelTourArrangement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="travel-tour-arrangement-form">
  <?php $form = ActiveForm::begin(); ?>
  <div class="form-container-main">
  <br><br>
        <div class="row">
            <!-- PLACE OF ORIGIN -->
            <div class="col-lg-2">
                <p class="form-label">Place of Origin</p>
            </div>
            <div class="col-lg-3">                   
                <?= $form->field($model, 'place_of_origin')->textInput(['maxlength' => 60])->label(false) ?>
            </div>
            <!-- DESTINATION -->
            <div class="col-lg-2">
                <p class="form-label">Destination</p>
            </div>
            <div class="col-lg-3">                   
                <?= $form->field($model, 'destination')->textInput(['maxlength' => 60])->label(false) ?>
            </div>
        </div>

        <!-- DEPARTURE DATE -->
        <div class="row">
            <div class="col-lg-2">
                <p class="form-label">Departure Date</p>
            </div>
            <div class="col-lg-3">                   
                <?= $form->field($model, 'departure_date')
                         ->widget(
                              DatePicker::className(), [
                               'inline' => false, 
                               'clientOptions' => [
                               'autoclose' => true,
                               'format' => 'yyyy-mm-dd',                                
                               'startDate' => '+1d'
                              ]])
                         ->label(false);?>
            </div>
        <!-- RETURN DATE -->
            <div class="col-lg-2">
                <p class="form-label">Return Date</p>
            </div>
            <div class="col-lg-3">                   
                <?= $form->field($model, 'return_date')
                         ->widget(
                              DatePicker::className(), [
                               'inline' => false, 
                               'clientOptions' => [
                               'autoclose' => true,
                               'format' => 'yyyy-mm-dd',                            
                               'startDate' => '+0d'
                              ]])
                         ->label(false);?>
            </div>
        </div>

        <!-- AIRLINE NAME -->
        <div class="row">
            <div class="col-lg-2">
                <p class="form-label">Airline Name</p>
            </div>
            <div class="col-lg-3">                   
                <?= $form->field($model, 'airline_name')
                         ->dropDownList(
                            ArrayHelper::map(Airlines::find()->all(),'airline_name', 'airline_name'),
                            ['prompt'=>'Select Airline'])->label(false)   ?>
            </div>
        </div>

        <!-- FLIGHT TYPE -->
        <div class="row">
            <div class="col-lg-2">
                <p class="form-label">Flight Type</p>
            </div>
            <div class="col-lg-3">                   
                <?= $form->field($model, 'flight_type')
                         ->dropDownList(['' => 'Select Flight Type',
                                         'One-Way Flight' => 'One-Way',
                                         'Round Trip Flight' => 'Round Trip']) 
                         ->label(false) ?>
            </div>
        </div>
    
        <!-- CLASS TYPE -->
        <div class="row">
            <div class="col-lg-2">
                <p class="form-label">Class Type</p>
            </div>
            <div class="col-lg-3">                   
                <?= $form->field($model, 'class_type')
                         ->dropDownList(['' => 'Select Class Type',
                                         'Economy Class' => 'Economy Class',
                                         'Business Class' => 'Business Class'])
                         ->label(false) ?>
            </div>
        </div>

        <!-- NUMBER OF PAX -->
        <div class="row">
            <div class="col-lg-2">
                <p class="form-label">Number of PAX</p>
            </div>
            <div class="col-lg-3">                   
                <?= $form->field($model, 'number_of_pax')->textInput() ->label(false) ?>
            </div>
        </div>

         <!-- HOTEL NAME -->
        <div class="row">
            <div class="col-lg-2">
                <p class="form-label">Hotel Name</p>
            </div>
            <div class="col-lg-2">                   
                <?= $form->field($model, 'hotel_name')
                         ->radioList(array('textBox' => 'Chosen Hotel: ',
                                      'Any Hotel' => 'Any Hotel'),['name'=>'hotel_name'])
                                       -> label (false) ?>
                            
            </div>   
            <div class="col-lg-3">         
                <?= $form->field($model, 'hotel_name')->textInput(['id'=>'textBox_hotel','style' => "display:none"])->label(false) ?>

            </div>
        </div>

        <?php
        $script = <<< JS
         //ALL JAVASCRIPT CODES
          $("input[name='hotel_name']").change(function(){
              if($(this).val() == "textBox")
              {
                $("#textBox_hotel").show();
                
             } else {
                $("#textBox_hotel").val('');
                $("#textBox_hotel").hide(); 
            }
          

          });
        
JS;
        $this -> registerJS($script);
        ?>


        <script type="text/javascript"></script>

        <!-- ROOM TYPE -->
        <div class="row">
            <div class="col-lg-2">
                <p class="form-label">Room Type</p>
            </div>
            <div class="col-lg-3">                   
                <?= $form->field($model, 'room_type')
                         ->dropDownList(['' => 'Select Room Type',
                                         'Twin Double' => 'Twin Double',
                                         'Triple' => 'Triple']) 
                         ->label(false) ?>
            </div>
        </div>
    
        <!-- INCLUSION -->    
        <div class="row">
            <div class="col-lg-1">
                <p class="form-label">INCLUSIONS</p>
            </div>
        
            <!-- TOUR TYPE INCLUSION-->
            <div class="col-lg-1"></div>
            <div class="col-lg-1">
                <br>
                <p class="form-label">Tour Type: </p>
            </div>
            <div class="col-lg-2">  
                <br><br>              
                <?= $form->field($model, 'inclusion_tour_type')
                         ->checkboxList(ArrayHelper::map(TourType::find()->all(), 'tour_name', 'tour_name'))
                         ->label(false) ?>
            </div>

            <!-- TRANSPORT SERVICES INCLUSION-->
            <div class="col-lg-1"></div>
            <div class="col-lg-1">
                <br>
                <p class="form-label">Transport Services: </p>
            </div>
            <div class="col-lg-2">  
                <br><br>              
                <?= $form->field($model, 'inclusion_transport_service')
                         ->checkboxList(ArrayHelper::map(TransportService::find()->all(), 'transport_type', 'transport_type'))
                         ->label(false) ?>
            </div>
        </div>
            
        <div class="row">
            <div class="col-lg-1"></div>
                
            <!-- FOOD DEALS INCLUSION-->
            <div class="col-lg-1"></div>
            <div class="col-lg-1">
                <br>
                <p class="form-label">Food Deals: </p>
            </div>
            <div class="col-lg-2">  
                <br><br>              
                <?= $form->field($model, 'inclusion_food_deals')
                         ->checkboxList(ArrayHelper::map(FoodDeals::find()->all(), 'food_deal_name', 'food_deal_name'))
                         ->label(false) ?>
            </div>

            <!-- FREEBIES INCLUSION-->
            <div class="col-lg-1"></div>
            <div class="col-lg-1">
                <br>
                <p class="form-label">Others: </p>
            </div>
            <div class="col-lg-3">  
                <br><br>              
                <?= $form->field($model, 'inclusion_freebies')
                         ->checkboxList(ArrayHelper::map(Freebies::find()->all(), 'freebies_name', 'freebies_name'))
                         ->label(false) ?>
            </div>
        </div>
   
        <!-- REMARKS -->
        <div class="row">
            <div class="col-lg-2">
                <p class="form-label">Remarks</p>
            </div>
            <div class="col-lg-8">                   
                <?= $form->field($model, 'remarks')->textarea(['rows' => 4]) ->label(false) ?>
            </div>
        </div>
    
       
            
        <!-- SUBMIT BUTTON -->
        <div class="form-group">
            <div class="btn-form-create">
                <?= Html::submitButton($model->isNewRecord ? 
                Yii::t('app', 'Submit Arrangement') : Yii::t('app', 'Update'), 
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>                
        </div>
    
    <?= Html::activeHiddenInput($model, 'arrangement_code') ?>   
    <?= Html::activeHiddenInput($model, 'user_id') ?>        
    <?php ActiveForm::end(); ?>
  </div>
</div>
