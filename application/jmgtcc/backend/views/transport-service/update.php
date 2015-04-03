<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TransportService */

$this->title = 'JMGTCC ADMIN';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transport Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->transport_type, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="transport-service-update">

    <div class="form-maintenance">
	    <h2>Record ID: <?= Html::encode($model->id) ?></h2>

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	    <br>

	</div>

</div>
