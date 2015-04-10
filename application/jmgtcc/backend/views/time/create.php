<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Time */

$this->title = 'JMGTCC ADMIN';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Times'), 'url' => ['index']];
?>
<div class="time-create">

    <div class="form-maintenance">
	    <h2>Appointment Time</h2>

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	    <br>

	</div>

</div>
