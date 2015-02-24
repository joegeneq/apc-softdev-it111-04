<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TravelArrangement */

$this->title = 'Update Travel Arrangement: ' . ' ' . $model->ArrangementID;
$this->params['breadcrumbs'][] = ['label' => 'Travel Arrangements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ArrangementID, 'url' => ['view', 'ArrangementID' => $model->ArrangementID, 'Airlines_AirlineID' => $model->Airlines_AirlineID, 'Hotels_HotelID' => $model->Hotels_HotelID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="travel-arrangement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
