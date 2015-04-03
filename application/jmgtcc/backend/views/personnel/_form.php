<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Personnel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personnel-form">

    <?php $form = ActiveForm::begin(); ?>

    <br>
    
    	<div class="row">
	        <div class="col-lg-3">
	            <p class="form-label required-field">Personnel name</p>
	         </div>
	        <div class="col-lg-6">                   
	            <?= $form->field($model, 'personnel_name')
	            	->textInput(['maxlength' => 45])
			    	->label(false) ?>
			</div>
		</div>

		<div class="row">
	        <div class="col-lg-3">
	            <p class="form-label required-field">JMGTCC Email</p>
	         </div>
	        <div class="col-lg-6">                   
	              <?= $form->field($model, 'email')
	              	->textInput(['maxlength' => 45])
			    	->label(false) ?>

			  	<div class="form-group">
			        <div class="submit-maintenance">
			        	<?= Html::submitButton($model->isNewRecord ? 
			        		Yii::t('app', 'Create') : Yii::t('app', 'Update'), 
			        		['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			        </div>
			    </div>

			</div>
		</div>   

    <?php ActiveForm::end(); ?>

</div>