<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Hotels */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotels-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'HotelName')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'Country')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
