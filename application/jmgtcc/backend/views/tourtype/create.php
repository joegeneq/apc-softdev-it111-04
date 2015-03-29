<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TourType */

$this->title = 'Tour Type';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tour Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-type-create">

    <div class="form-maintenance">
	    <h2>Tour Type</h2>

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	    <br>

	</div>

</div>
