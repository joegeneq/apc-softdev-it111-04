<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TravelArrangementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="travel-arrangement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'arrangement_code') ?>

    <?= $form->field($model, 'departure_date') ?>

    <?= $form->field($model, 'return_date') ?>

    <?= $form->field($model, 'place_of_origin') ?>

    <?php // echo $form->field($model, 'destination') ?>

    <?php // echo $form->field($model, 'number_of_adult') ?>

    <?php // echo $form->field($model, 'numbrt_of_children') ?>

    <?php // echo $form->field($model, 'number_of_infant') ?>

    <?php // echo $form->field($model, 'number_of_rooms') ?>

    <?php // echo $form->field($model, 'hotel_name') ?>

    <?php // echo $form->field($model, 'star_rating') ?>

    <?php // echo $form->field($model, 'accommodation') ?>

    <?php // echo $form->field($model, 'flight_type') ?>

    <?php // echo $form->field($model, 'cabin_type') ?>

    <?php // echo $form->field($model, 'tour_type') ?>

    <?php // echo $form->field($model, 'tour_deals') ?>

    <?php // echo $form->field($model, 'transport_service') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'date_confirmed') ?>

    <?php // echo $form->field($model, 'confirmed_by') ?>

    <?php // echo $form->field($model, 'date_updated') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'hotels_id') ?>

    <?php // echo $form->field($model, 'airlines_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
