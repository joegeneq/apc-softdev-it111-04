<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Personnel */

$this->title ='JMGTCC ADMIN';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personnels'), 'url' => ['index']];
?>
<div class="personnel-create">

	<div class="form-maintenance">
	    <h2>JMGTCC Personnel</h2>

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	    <br>

	</div>

</div>
