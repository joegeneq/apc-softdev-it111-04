<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

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
            <?= $form->field($model, 'arrival_date')->textInput()->label(false) ?>         
        </div>
        <!--Night -->
        <div class="col-lg-2">
            <p class="form-label">Departure Date</p>             
        </div>
        <div class="col-lg-2">         
            <?= $form->field($model, 'departure_date')->textInput()->label(false) ?>    
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
            <?= $form->field($model, 'hotel_name')->textInput(['maxlength' => 60])->label(false) ?>
        </div>
    </div>


    <?= $form->field($model, 'arrival_date')->textInput() ?>

    <?= $form->field($model, 'departure_date')->textInput() ?>

    <?= $form->field($model, 'number_of_pax')->textInput() ?>

    <?= $form->field($model, 'hotel_name')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'room_type')->textInput(['maxlength' => 80]) ?>

    <?= $form->field($model, 'inclusion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hotels_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
