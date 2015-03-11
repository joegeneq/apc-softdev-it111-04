<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TourType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tour-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tour_name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'tour_description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
