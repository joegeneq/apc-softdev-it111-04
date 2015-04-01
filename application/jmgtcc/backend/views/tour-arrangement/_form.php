<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TourArrangement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tour-arrangement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'arrangement_code')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'place_of_origin')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'destination')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'arrival_date')->textInput() ?>

    <?= $form->field($model, 'return_date')->textInput() ?>

    <?= $form->field($model, 'number_of_pax')->textInput() ?>

    <?= $form->field($model, 'hotel_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'room_type')->textInput(['maxlength' => 80]) ?>

    <?= $form->field($model, 'inclusion_food_deals')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'inclusion_freebies')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'inclusion_tour_type')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'inclusion_transport_service')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
