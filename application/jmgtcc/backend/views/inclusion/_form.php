<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Inclusion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inclusion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'inclusion_name')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'inclusion_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
