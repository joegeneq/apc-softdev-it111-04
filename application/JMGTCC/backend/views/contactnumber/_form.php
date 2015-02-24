<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ContactNumber */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-number-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Country')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'Prefix')->textInput(['maxlength' => 5]) ?>

    <?= $form->field($model, 'Digits')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
