<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Inclusion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inclusion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tour_type')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'food_deals')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'transport_service')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'freebies')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
