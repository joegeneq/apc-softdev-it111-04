<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TravelArrangementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="travel-arrangement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ArrangementID') ?>

    <?= $form->field($model, 'DepartureDate') ?>

    <?= $form->field($model, 'ReturnDate') ?>

    <?= $form->field($model, 'PlaceOfOrigin') ?>

    <?= $form->field($model, 'Destination') ?>

    <?php // echo $form->field($model, 'NumberOfAdult') ?>

    <?php // echo $form->field($model, 'NumberOfChildren') ?>

    <?php // echo $form->field($model, 'NumberOfInfant') ?>

    <?php // echo $form->field($model, 'NumberOfRooms') ?>

    <?php // echo $form->field($model, 'HotelName') ?>

    <?php // echo $form->field($model, 'StarRating') ?>

    <?php // echo $form->field($model, 'Accommodation') ?>

    <?php // echo $form->field($model, 'Flight Type') ?>

    <?php // echo $form->field($model, 'CabinType') ?>

    <?php // echo $form->field($model, 'TourType') ?>

    <?php // echo $form->field($model, 'TourDeals') ?>

    <?php // echo $form->field($model, 'TransportService') ?>

    <?php // echo $form->field($model, 'DateCreated') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'DateConfirmed') ?>

    <?php // echo $form->field($model, 'ConfirmedBy') ?>

    <?php // echo $form->field($model, 'DateUpdated') ?>

    <?php // echo $form->field($model, 'UpdatedBy') ?>

    <?php // echo $form->field($model, 'Airlines_AirlineID') ?>

    <?php // echo $form->field($model, 'Hotels_HotelID') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
