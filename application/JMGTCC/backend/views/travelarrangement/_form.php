<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TravelArrangement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="travel-arrangement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DepartureDate')->textInput() ?>

    <?= $form->field($model, 'ReturnDate')->textInput() ?>

    <?= $form->field($model, 'PlaceOfOrigin')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'Destination')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'NumberOfAdult')->textInput() ?>

    <?= $form->field($model, 'NumberOfChildren')->textInput() ?>

    <?= $form->field($model, 'NumberOfInfant')->textInput() ?>

    <?= $form->field($model, 'NumberOfRooms')->textInput() ?>

    <?= $form->field($model, 'HotelName')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'StarRating')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'Accommodation')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Flight Type')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'CabinType')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'TourType')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'TourDeals')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'TransportService')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'DateCreated')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'DateConfirmed')->textInput() ?>

    <?= $form->field($model, 'ConfirmedBy')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'DateUpdated')->textInput() ?>

    <?= $form->field($model, 'UpdatedBy')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'Airlines_AirlineID')->textInput() ?>

    <?= $form->field($model, 'Hotels_HotelID')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
