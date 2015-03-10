<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TourArrangement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tour-arrangement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'destination')->textInput(['maxlength' => 90]) ?>

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
