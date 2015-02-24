<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TourDeals */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tour-deals-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DealName')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'DealDescription')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
