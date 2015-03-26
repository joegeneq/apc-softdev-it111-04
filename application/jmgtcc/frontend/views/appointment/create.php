<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Appointment */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Appointment',
]);

if (Yii::$app->user->identity->username != null)
{
	$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appointments'), 'url' => ['index']];
}
	
?>
<div class="appointment-create">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<br>
