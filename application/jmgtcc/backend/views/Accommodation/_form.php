<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Accommodation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accommodation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'accommodation_name')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'accommodation_desc')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
