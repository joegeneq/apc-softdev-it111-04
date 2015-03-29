<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Freebies */

$this->title = 'Freebies';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Freebies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freebies-create">

    <div class="form-maintenance">
	    <h2>Freebies</h2>

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	    <br>

	</div>

</div>
