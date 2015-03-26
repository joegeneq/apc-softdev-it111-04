<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Appointment */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Appointment',
]);
// if session
//{
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appointments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//}
?>
<div class="appointment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
