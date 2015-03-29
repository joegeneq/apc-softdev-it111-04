<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TransportService */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transport-service-form">

	<?php $form = ActiveForm::begin(); ?>

	<br>
    
    	<div class="row">
	        <div class="col-lg-3">
	            <p class="form-label required-field">Transport Type</p>
	         </div>
	        <div class="col-lg-6">                   
	           <?= $form->field($model, 'transport_type')
	           		->textInput(['maxlength' => 25])
			    	->label(false) ?>
			</div>
		</div>

		<div class="row">
	        <div class="col-lg-3">
	            <p class="form-label required-field">Transport Description</p>
	         </div>
	        <div class="col-lg-6">                   
	             <?= $form->field($model, 'transport_description')
	             	->textarea(['rows' => 6])
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
