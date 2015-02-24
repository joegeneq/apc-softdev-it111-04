<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TourDeals */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tour Deals',
]) . ' ' . $model->DealID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tour Deals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->DealID, 'url' => ['view', 'id' => $model->DealID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tour-deals-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
