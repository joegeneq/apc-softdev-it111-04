<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TravelArrangement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="travel-arrangement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'arrangement_code')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'departure_date')->textInput() ?>

    <?= $form->field($model, 'return_date')->textInput() ?>

    <?= $form->field($model, 'place_of_origin')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'destination')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'number_of_adult')->textInput() ?>

    <?= $form->field($model, 'numbrt_of_children')->textInput() ?>

    <?= $form->field($model, 'number_of_infant')->textInput() ?>

    <?= $form->field($model, 'number_of_rooms')->textInput() ?>

    <?= $form->field($model, 'hotel_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'star_rating')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'accommodation')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'flight_type')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'cabin_type')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'tour_type')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'tour_deals')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'transport_service')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'date_confirmed')->textInput() ?>

    <?= $form->field($model, 'confirmed_by')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'date_updated')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hotels_id')->textInput() ?>

    <?= $form->field($model, 'airlines_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
