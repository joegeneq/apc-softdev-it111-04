<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ContactNumber */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-number-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'prefix')->textInput(['maxlength' => 5]) ?>

    <?= $form->field($model, 'digits')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
