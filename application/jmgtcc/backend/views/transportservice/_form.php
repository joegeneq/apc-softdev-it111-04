<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TransportService */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transport-service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'transport_type')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'transport_description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
