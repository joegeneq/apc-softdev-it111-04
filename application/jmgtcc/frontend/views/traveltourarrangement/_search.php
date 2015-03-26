<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TravelTourArrangementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="travel-tour-arrangement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'arrangement_code') ?>

    <?= $form->field($model, 'place_of_origin') ?>

    <?= $form->field($model, 'destination') ?>

    <?= $form->field($model, 'departure_date') ?>

    <?php // echo $form->field($model, 'return_date') ?>

    <?php // echo $form->field($model, 'airline_name') ?>

    <?php // echo $form->field($model, 'flight_type') ?>

    <?php // echo $form->field($model, 'class_type') ?>

    <?php // echo $form->field($model, 'number_of_pax') ?>

    <?php // echo $form->field($model, 'hotel_name') ?>

    <?php // echo $form->field($model, 'room_type') ?>

    <?php // echo $form->field($model, 'inclusion_food_deals') ?>

    <?php // echo $form->field($model, 'inclusion_freebies') ?>

    <?php // echo $form->field($model, 'inclusion_tour_type') ?>

    <?php // echo $form->field($model, 'inclusion_transport_service') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
