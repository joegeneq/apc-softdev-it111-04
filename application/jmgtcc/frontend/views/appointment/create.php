<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Appointment */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Appointment',
]);

?>
<div class="appointment-create">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
