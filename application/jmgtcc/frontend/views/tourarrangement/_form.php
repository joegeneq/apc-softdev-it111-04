<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TourArrangement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tour-arrangement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'destination')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'departure_date')->textInput() ?>

    <?= $form->field($model, 'return_date')->textInput() ?>

    <?= $form->field($model, 'airline_name')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'flight_type')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'class_type')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'number_of_pax')->textInput() ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
