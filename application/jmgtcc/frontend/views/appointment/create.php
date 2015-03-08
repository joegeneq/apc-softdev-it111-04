<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Appointment */

$this->title = Yii::t('app', 'Set an {modelClass}', [
    'modelClass' => 'Appointment',
]);
// $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appointments'), 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-create">

    <!-- <h3><?= Html::encode($this->title) ?></h3> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
