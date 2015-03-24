<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use dosamigos\datepicker\DatePicker; 
use backend\models\FoodDeals;
use backend\models\TourType;
use backend\models\Freebies;
use backend\models\TransportService;
use backend\models\Hotels;

/* @var $this yii\web\View */
/* @var $model frontend\models\TourArrangement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tour-arrangement-form">

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

      <!-- ARRIVAL DATE -->
      <div class="row">
        <div class="col-lg-2">
          <p class="form-label">Arrival Date</p>
        </div>
        <div class="col-lg-3">                   
          <?= $form->field($model, 'arrival_date')
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
                   ->dropdownList(ArrayHelper::map(Hotels::find()->all(),'id', 'hotel_name'),
                            ['prompt'=>'Select Hotel',
                              'options' => ['id' => 'hotel_name' ]

                            ])
                   ->label(false) ?>
        </div>
         <div class="col-lg-2">
          <p class="form-label">Others:</p>
        </div>
        <div class="col-lg-3">                   
          <?= $form->field($model, 'hotel_name')->textInput(['maxlength' => 100])->label(false) ?>
        </div>
      </div>
   
      <!-- ROOM TYPE -->
        <div class="row">
          <div class="col-lg-2">
            <p class="form-label">Room Type</p>
          </div>
          <div class="col-lg-3">                   
            <?= $form->field($model, 'room_type')
                     ->dropdownList([ '' => 'Select Room Type',
                                      'Single' => 'Single',
                                      'Twin Double' => 'Twin Double',
                                      'Triple' => 'Triple'])
                     ->label(false)?>
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
    </div>

     <?= Html::activeHiddenInput($model, 'place_of_origin') ?> 
     <?= Html::activeHiddenInput($model, 'date_created') ?> 
     <?= Html::activeHiddenInput($model, 'status') ?>    
     <?= Html::activeHiddenInput($model, 'date_confirmed') ?> 
     <?= Html::activeHiddenInput($model, 'date_created') ?>
     <?= Html::activeHiddenInput($model, 'confirmed_by') ?>     
     <?= Html::activeHiddenInput($model, 'date_updated') ?> 
     <?= Html::activeHiddenInput($model, 'updated_by') ?> 
    
    <?php ActiveForm::end(); ?>

</div>
<!--
<?php
$script = <<< JS
//ALL JAVASCRIPT CODES
$('#tourarrangement-hotel_name').change(function(){
  alert();
});

JS;
$this -> registerJS($script);
?>
-->