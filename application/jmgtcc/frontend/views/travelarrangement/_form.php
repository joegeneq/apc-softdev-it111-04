<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use dosamigos\datepicker\DatePicker;
use backend\models\Accommodation;
use backend\models\TourDeals;
use backend\models\Airlines;
use backend\models\Hotels;

/* @var $this yii\web\View */
/* @var $model frontend\models\TravelArrangement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="travel-arrangement-form">

    <?php $form = ActiveForm::begin(); ?>
 <br/><br/>
    <!-- ARRANGEMENT CODE -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Arrangement Code</p>
                 </div>
                <div class="col-lg-3">                   
                     <?= $form->field($model, 'arrangement_code')->textInput(['maxlength' => 25])->label(false) ?>
                </div>
            </div>

     <!-- DEPARTURE DATE -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Departure Date</p>
                 </div>
                <div class="col-lg-3">                   
                     <?= $form->field($model, 'departure_date')->widget(
                        DatePicker::className(), [
                            'inline' => false, 
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'MM-dd-yyyy',
                                
                                'startDate' => '+0d'
                            ]
                    ])->label(false);?>
                </div>
            </div>

        <!-- RETURN DATE -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Return Date</p>
                 </div>
                <div class="col-lg-3">                   
                     <?= $form->field($model, 'return_date')->widget(
                        DatePicker::className(), [
                            'inline' => false, 
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'MM-dd-yyyy',                            
                                'startDate' => '+0d'
                            ]
                    ])->label(false);?>
                </div>
            </div>

            <!-- PLACE OF ORIGIN -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Place of Origin</p>
                 </div>
                <div class="col-lg-3">                   
                     <?= $form->field($model, 'place_of_origin')->textInput(['maxlength' => 60])->label(false) ?>
                </div>
            </div>

              <!-- DESTINATION -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Destination</p>
                 </div>
                <div class="col-lg-3">                   
                      <?= $form->field($model, 'destination')->textInput(['maxlength' => 60])->label(false) ?>
                </div>
            </div>
    
             <!-- NUMBER OF ADULT -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Number of Adult</p>
                 </div>
                <div class="col-lg-3">                   
                      <?= $form->field($model, 'number_of_adult')->label(false) ?>
                </div>
            </div>

             <!-- NUMBER OF CHILDREN -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Number of Children</p>
                 </div>
                <div class="col-lg-3">                   
                     <?= $form->field($model, 'numbrt_of_children')->textInput()->label(false) ?>
                </div>
            </div>
    
             <!-- NUMBER OF INFANT -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Number of Infant</p>
                 </div>
                <div class="col-lg-3">                   
                     <?= $form->field($model, 'number_of_infant')->textInput()->textInput()->label(false) ?>
                </div>
            </div>

             <!-- NUMBER OF ROOMS -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Number of Rooms</p>
                 </div>
                <div class="col-lg-3">                   
                     <?= $form->field($model, 'number_of_rooms')->textInput()->textInput()->label(false) ?>
                </div>
            </div>    

              <!-- HOTEL NAME -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Hotel Name</p>
                 </div>
                <div class="col-lg-3">                   
                      <?= $form->field($model, 'hotel_name')->textInput(['maxlength' => 100])->label(false) ?>
                </div>
            </div>    

              <!-- STAR RATING -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Star Rating</p>
                 </div>
                <div class="col-lg-3">                   
                    <?= $form->field($model, 'star_rating')->textInput(['maxlength' => 20])->label(false) ?>
                </div>
            </div>    

             <!-- ACCOMMODATION -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Accommodation</p>
                 </div>
                <div class="col-lg-3">                   
                    <?= $form->field($model, 'accommodation')->dropDownList(
                    ArrayHelper::map(Accommodation::find()->all(),'id', 'accommodation_name'),
                   ['prompt'=>'Select Accommodation'])->label(false)   ?>
                </div>
            </div>    


   
             <!-- FLIGHT TYPE -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Flight Type</p>
                 </div>
                <div class="col-lg-3">                   
                    <?= $form->field($model, 'flight_type')->dropDownList(
                      ArrayHelper::map($flight = [
                            ['id' => '1', 'flight_type' => 'One-Way'],
                            ['id' => '2', 'flight_type' => 'Round Trip'],
                        ],'id', 'flight_type'),                   
                     ['prompt'=> 'Select Flight Type'])->label(false)   ?>
                </div>
            </div>    
    
              <!-- CABIN TYPE -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Cabin Type</p>
                 </div>
                <div class="col-lg-3">                   
                   <?= $form->field($model, 'cabin_type')->dropDownList(
                      ArrayHelper::map($cabin = [
                            ['id' => '1', 'cabin_type' => 'Economy Class'],
                            ['id' => '2', 'cabin_type' => 'Business Class'],
                        ],'id', 'cabin_type'),                   
                     ['prompt'=> 'Select Cabin Type'])->label(false)   ?>
                </div>
            </div>    
      
             <!-- TOUR TYPE -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Tour Type</p>
                 </div>
                <div class="col-lg-3">                   
                  <?= $form->field($model, 'tour_type')->dropDownList(
                      ArrayHelper::map($tour = [
                            ['id' => '1', 'tour_type' => 'No Tours'],
                            ['id' => '2', 'tour_type' => 'Private Guided Tours'],
                            ['id' => '3', 'tour_type' => 'Group Tours'],
                            ['id' => '4', 'tour_type' => 'All Tours'],
                        ],'id', 'tour_type'),                   
                     ['prompt'=> 'Select Tour Type'])->label(false)   ?>
                </div>
            </div>    
    
             <!-- TOUR DEALS -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Tour Deals</p>
                 </div>
                <div class="col-lg-3">                   
                   <?= $form->field($model, 'tour_deals')->dropDownList(
                  ArrayHelper::map(TourDeals::find()->all(),'id', 'deal_name'),
                  ['prompt'=>'Select Tour Deals'])->label(false)   ?>
                </div>
            </div>    

          <!-- TRANSPORT SERVICE -->
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Transport Service</p>
                 </div>
                <div class="col-lg-3">                   
                  <?= $form->field($model, 'transport_service')->dropDownList(
                      ArrayHelper::map($transport = [
                            ['id' => '1', 'transport_service' => 'Bus'],
                            ['id' => '2', 'transport_service' => 'Rent a car'],
                            ['id' => '3', 'transport_service' => 'Private car and Driver'],
                        ],'id', 'transport_service'),                   
                     ['prompt'=> 'Select Transport Service'])->label(false)   
                     ?>
                </div>
            </div>    
    
          <!-- ALL FIELDS UNDER ARE Initial GUI ONLY -->
             <!-- HOTEL ID -->        
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Hotels ID</p>
                 </div>
                <div class="col-lg-3">                   
                  <?= $form->field($model, 'hotels_id')->dropDownList(
                  ArrayHelper::map(Hotels::find()->all(),'id', 'hotel_name'),
                  ['prompt'=>'Select Hotel'])->label(false)   ?>
                </div>
            </div>    

            <!-- AIRLINES ID -->        
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">Airlines ID</p>
                 </div>
                <div class="col-lg-3">                   
                    <?= $form->field($model, 'airlines_id')->dropDownList(
                  ArrayHelper::map(Airlines::find()->all(),'id', 'airline_name'),
                  ['prompt'=>'Select Airline'])->label(false)   ?>
                </div>
            </div>    

            <!-- USER ID -->        
            <div class="row">
                <div class="col-lg-2">
                    <p class="form-label">User ID</p>
                 </div>
                <div class="col-lg-3">                   
                  <?= $form->field($model, 'user_id')->textInput()->label(false) ?>
                </div>
            </div>       

          <!-- SUBMIT BUTTON -->
            <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 
                        Yii::t('app', 'Create') : Yii::t('app', 'Update'),
                        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                </div>
            </div>

     <!--
    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'date_confirmed')->textInput() ?>

    <?= $form->field($model, 'confirmed_by')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'date_updated')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>
    -->
    

    <?php ActiveForm::end(); ?>

</div>
