<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Airlines */

$this->title = 'Airlines';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Airlines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="airlines-create">

	<div class="form-maintenance">
	    <h2>Airline</h2>

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	    <br>

	</div>

</div>
