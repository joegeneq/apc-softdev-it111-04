<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FoodDeals */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="food-deals-form">

    <?php $form = ActiveForm::begin(); ?>

    <br>
    
    	<div class="row">
	        <div class="col-lg-3">
	            <p class="form-label required-field">Deal name</p>
	         </div>
	        <div class="col-lg-6">                   
	            <?= $form->field($model, 'food_deal_name')
	            	->textInput(['maxlength' => 45])
			    	->label(false) ?>
			</div>
		</div>

		<div class="row">
	        <div class="col-lg-3">
	            <p class="form-label required-field">Deal Description</p>
	         </div>
	        <div class="col-lg-6">                   
	            <?= $form->field($model, 'food_deal_description')
	            	->textarea(['rows' => 6])
			    	->label(false) ?>

			  	<div class="form-group">
			        <div class="submit-maintenance">
			        	<?= Html::submitButton($model->isNewRecord ? 
			        		Yii::t('app', 'Create') : Yii::t('app', 'Update'), 
			        		['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

						<?php echo Html::a('Cancel', ['/food-deals/index'], 
                                    ['class' => 'btn btn-danger']); ?>

			        </div>
			    </div>

			</div>
		</div>

    <?php ActiveForm::end(); ?>

</div>
