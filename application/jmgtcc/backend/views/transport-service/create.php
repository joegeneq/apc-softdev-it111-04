<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TransportService */

$this->title = 'JMGTCC ADMIN';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transport Services'), 'url' => ['index']];
?>
<div class="transport-service-create">

    <div class="form-maintenance">
	    <h2>Transport Services</h2>

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	    <br>

	</div>

</div>
