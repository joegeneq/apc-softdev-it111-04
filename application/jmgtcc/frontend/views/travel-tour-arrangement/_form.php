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

           <h3>Create a Travel & Tour Arrangement</h3>
            <p>Please fill out the following fields for a customized travel & tour:</p>

            <br>
            <div class="arrangement-division"><b class="division-label">Travel Details</b></div>
            <br>
            <div class="row">
                <!-- PLACE OF ORIGIN -->
                <div class="col-lg-2">
                    <p class="form-label">Place of Origin</p>
                </div>
                <div class="col-lg-4">                   
                    <?= $form->field($model, 'place_of_origin')->textInput(['maxlength' => 60])->label(false) ?>
                </div>
                <!-- DESTINATION -->
                <div class="col-lg-2">
                    <p class="form-label required-field">Destination</p>
                </div>
                <div class="col-lg-4">                   
                    <?= $form->field($model, 'destination')->textInput(['maxlength' => 60])->label(false) ?>
                </div>
            </div>

            
            <div class="row">
                <!-- DEPARTURE DATE -->
                <div class="col-lg-2"> 
                    <p class="form-label required-field">Departure Date</p>
                </div>
                <div class="col-lg-4">                   
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
                    <p class="form-label required-field">Return Date</p>
                </div>
                <div class="col-lg-4">                   
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
            <?php
              $script = <<< JS
                //ALL JAVASCRIPT CODES
                $("#traveltourarrangement-return_date").change(function(){
                  var departureDate = $("input[name='TravelTourArrangement[departure_date]']").val();
                  var returnDate = $("input[name='TravelTourArrangement[return_date]']").val();
                  
                  if (Date.parse(departureDate) > Date.parse(returnDate)) {
                  //This request should not be processed!
                    alert("The return date MUST be after the selected departure date ")
                    $("#traveltourarrangement-return_date").val('');      
                  }  
                  else {
                  }       
                });
JS;
    $this -> registerJS($script);
?>
           
            <br>
            <div class="arrangement-division"><b class="division-label">Flight Information</b></div>
            <br>

            <div class="row">
                <!-- AIRLINE NAME -->   
                <div class="col-lg-2">
                    <p class="form-label">Airline Name</p>
                </div>
                <div class="col-lg-4">                   
                    <?= $form->field($model, 'airline_name')
                             ->dropDownList(
                                ArrayHelper::map(Airlines::find()->all(),'airline_name', 'airline_name'),
                                ['prompt'=>'Any airline'])->label(false)   ?>
                </div>
                <!-- FLIGHT TYPE -->      
                <div class="col-lg-2">
                    <p class="form-label required-field">Flight Type</p>
                </div>
                <div class="col-lg-4">                   
                    <?= $form->field($model, 'flight_type')
                             ->dropDownList(['' => 'Select Flight Type',
                                             'One-Way Flight' => 'One-Way',
                                             'Round Trip Flight' => 'Round Trip']) 
                             ->label(false) ?>
                </div>
            </div>    
        
            <div class="row">
                <!-- CLASS TYPE -->
                <div class="col-lg-2">
                    <p class="form-label">Class Type</p>
                </div>
                <div class="col-lg-4">                   
                    <?= $form->field($model, 'class_type')
                             ->dropDownList(['' => 'Any class type',
                                             'Economy Class' => 'Economy Class',
                                             'Business Class' => 'Business Class'])
                             ->label(false) ?>
                </div>
            </div>

        
            <div class="row">
                <!-- NUMBER OF PAX -->
                <div class="col-lg-2">
                    <p class="form-label required-field">Number of PAX</p>
                </div>
                <div class="col-lg-4">                   
                    <?= $form->field($model, 'number_of_pax')->textInput() ->label(false) ?>
                </div>
            </div>

            <br>
            <div class="arrangement-division"><b class="division-label">Accommodation</b></div>
            <br>

         
            <div class="row">
                <!-- HOTEL NAME -->
                <div class="col-lg-2">
                    <p class="form-label">Hotel Name</p>
                </div>
                <div class="col-lg-2">                   
                    <?= $form->field($model, 'hotel_name')
                             ->radioList(array('textBox' => 'Chosen Hotel: ',
                                          'Any Hotel' => 'Any Hotel'),['name'=>'hotel_name'])
                                           -> label (false) ?>                                
                </div> 
                <div class="col-lg-4">         
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

        
            <div class="row">
                <!-- ROOM TYPE -->
                <div class="col-lg-2">
                    <p class="form-label required-field">Room Type</p>
                </div>
                <div class="col-lg-3">                   
                    <?= $form->field($model, 'room_type')
                             ->dropDownList(['' => 'Select Room Type',
                                             'Twin Double' => 'Twin Double',
                                             'Triple' => 'Triple']) 
                             ->label(false) ?>
                </div>
            </div>
            <br>            
            <!-- INCLUSION -->   
            <div class="arrangement-division"><b class="division-label">Tour and Transport</b>
            </div>
            <div class="row">            
                <!-- TOUR TYPE INCLUSION-->            
                <div class="col-lg-5">
                    <p class="form-label">What types of tour would you like to have? </p>
                    <div class="row">
                      <!-- TOUR NAME -->          
                      <div class="col-lg-5"> 
                        <div class="tour-content">
                          <?= $form->field($model, 'inclusion_tour_type')
                                   ->checkboxList(ArrayHelper::map(TourType::find()->all(), 'tour_name', 'tour_name'))
                                   ->label(false)
                                     ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                <div class="col-lg-6">
                  <p class="form-label">What kind of transport services would you like to take? </p>
                  <div class="row">
                    <!-- TRANSPORT SERVICES -->
                    <div class="col-lg-5"> 
                      <div class="transpo-content">                          
                        <?= $form->field($model, 'inclusion_transport_service')
                                 ->checkboxList(ArrayHelper::map(TransportService::find()->all(), 'transport_type', 'transport_type'))
                                 ->label(false)
                                  ?>
                      </div>
                    </div>            
                  </div>
                </div>
            </div>
            <br>
             <!-- INCLUSION -->
            <div class="arrangement-division"><b class="division-label">Inclusion</b>
            </div>
            <div class="row">            
                <!-- TOUR TYPE INCLUSION-->            
                <div class="col-lg-5">
                    <p class="form-label">What kind of food package would you like to avail? </p>
                    <div class="row">
                      <!-- FOOD DEALS -->          
                      <div class="col-lg-5"> 
                         <div class="food-content">
                            <?= $form->field($model, 'inclusion_food_deals')
                                     ->checkboxList(ArrayHelper::map(FoodDeals::find()->all(), 'food_deal_name', 'food_deal_name'))
                                     ->label(false) ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                <div class="col-lg-6">
                  <p class="form-label">Additional deals: </p>
                  <div class="row">
                    <!-- FREEBIES -->
                    <div class="col-lg-5"> 
                      <div class="freebies-content">                          
                        <?= $form->field($model, 'inclusion_freebies')
                                 ->checkboxList(ArrayHelper::map(Freebies::find()->all(), 'freebies_name', 'freebies_name'))
                                 ->label(false) ?>
                      </div>
                    </div>            
                  </div>
                </div>
            </div>
            <br>
            <div class="arrangement-division"><b class="division-label">Others</b></div>
            <br>            
            <div class="row">
                <!-- REMARKS -->
                <div class="col-lg-2">
                    <p class="form-label">Notes:</p>
                </div>
                <div class="col-lg-8">                   
                    <?= $form->field($model, 'remarks')->textarea(['rows' => 4]) ->label(false) ?>
                </div>
            </div>

      </div>

       <!-- SUBMIT BUTTON -->
        <div class="form-group">
            <div class="btn-form-create">                
                <?= Html::submitButton($model->isNewRecord ? 
                    Yii::t('app', 'Submit Arrangement') : Yii::t('app', 'Update'), 
                    ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            
                <?php echo Html::a('Cancel', ['/travel-tour-arrangement/index'], 
                                    ['class' => 'btn btn-danger']); ?>

            </div>                
        </div>

        <br>

    <?php ActiveForm::end(); ?>

</div>
