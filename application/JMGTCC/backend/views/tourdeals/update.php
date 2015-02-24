<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TourDeals */

$this->title = 'Update Tour Deals: ' . ' ' . $model->DealID;
$this->params['breadcrumbs'][] = ['label' => 'Tour Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->DealID, 'url' => ['view', 'id' => $model->DealID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tour-deals-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
