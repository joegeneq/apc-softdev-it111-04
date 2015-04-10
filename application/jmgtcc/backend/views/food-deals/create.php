<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FoodDeals */

$this->title = 'JMGTCC ADMIN;'
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Food Deals'), 'url' => ['index']];
?>
<div class="food-deals-create">

   <div class="form-maintenance">
	    <h2>Food Deal</h2>

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	    <br>

	</div>

</div>
