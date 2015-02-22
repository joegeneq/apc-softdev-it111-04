<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Deals */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deals-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Deal')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'Description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
