<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Hotels */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotels-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hotel_name')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
