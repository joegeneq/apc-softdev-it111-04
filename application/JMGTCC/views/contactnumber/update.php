<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ContactNumber */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Contact Number',
]) . ' ' . $model->NumberID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contact Numbers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NumberID, 'url' => ['view', 'id' => $model->NumberID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="contact-number-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
