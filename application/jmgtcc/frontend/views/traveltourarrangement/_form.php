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
use backend\models\Hotels;

/* @var $this yii\web\View */
/* @var $model frontend\models\TravelTourArrangement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="travel-tour-arrangement-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="form-container-main">
        <br><br>

        <!-- DESTINATION -->
        <div class="row">
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
                            ArrayHelper::map(Airlines::find()->all(),'id', 'airline_name'),
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
            <div class="col-lg-3">                   
                <?= $form->field($model, 'hotel_name')
                         ->radioList(array('dropDown'=>'Choose from Hotels List',
                                           'textBox'=>'Input Hotel Name'))
                                       -> label (false) ?>
                     
            </div>
            <div class="col-lg-1">
                <p class="form-label">Others:</p>
            </div>
            <div class="col-lg-3">                   
                <?= $form->field($model, 'hotel_name')->textInput(['maxlength' => 100]) ->label(false) ?>
            </div>
        </div>

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
    
        <!-- USER -->
        <div class="row">
            <div class="col-lg-2">
                <p class="form-label">USER</p>
            </div>
            <div class="col-lg-3">                   
                <?= $form->field($model, 'user_id')->textInput()->label(false) ?>
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
        

    
    
    <!--
     <?= $form->field($model, 'place_of_origin')->textInput(['maxlength' => 60]) ?>

     <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'date_confirmed')->textInput() ?>

    <?= $form->field($model, 'confirmed_by')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'date_updated')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'arrangement_code')->textInput(['maxlength' => 25])->label(false) ?>
    -->
    <?php ActiveForm::end(); ?>
</div>
<!--
<?php
$script = <<< JS
//ALL JAVASCRIPT CODES
$('#traveltourarrangement-hotel_name').change(function(){
  alert();
});

JS;
$this -> registerJS($script);
?>
-->
</div>
