<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Freebies */

$this->title = 'JMGTCC ADMIN';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Freebies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->freebies_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="freebies-update">

   <div class="form-maintenance">
	    <h2>Record ID: <?= Html::encode($model->id) ?></h2>

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	    <br>

	</div>

</div>
