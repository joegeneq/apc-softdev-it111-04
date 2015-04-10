<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TourType */

$this->title = 'JMGTCC ADMIN';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tour Types'), 'url' => ['index']];
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
