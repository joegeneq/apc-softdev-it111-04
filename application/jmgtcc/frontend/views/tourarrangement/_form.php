<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use dosamigos\datepicker\DatePicker;
use backend\models\Inclusion;
use backend\models\Hotels;

/* @var $this yii\web\View */
/* @var $model frontend\models\TourArrangement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tour-arrangement-form">

    <?php $form = ActiveForm::begin(); ?>

      <br><br>  
    <!-- Destination -->
    <div class="row">
        <div class="col-lg-2">
            <p class="form-label">Destination</p>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'destination')->textInput(['maxlength' => 90])->label(false) ?>
        </div>
    </div>

    <!-- Arrival and Departure Date -->
    <div class="row">
        <div class="col-lg-2">
            <p class="form-label">Arrival Date</p>     
        </div>
        <div class="col-lg-2">         
            <?= $form->field($model, 'arrival_date')
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
    </div>

    <!-- Number of Pax -->
    <div class="row">
        <div class="col-lg-2">
            <p class="form-label">Number of Pax</p>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'number_of_pax')->textInput()->label(false) ?>
        </div>
    </div>
   
    <!-- Hotel Name -->
    <div class="row">
        <div class="col-lg-2">
            <p class="form-label">Hotel Name</p>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'hotel_name')->dropDownList(              
                ArrayHelper::map(Hotels::find()->all(),'id','hotel_name'),
                ['prompt'=>'Select Hotel']) ->label(false) ?>
        </div>
    </div>


    <!-- Room Type -->
    <div class="row">
        <div class="col-lg-2">
            <p class="form-label">Room Type</p>
        </div>
        <div class="col-lg-4">
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

    <?php ActiveForm::end(); ?>

</div>
