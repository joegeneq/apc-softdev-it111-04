<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Hotels */

$this->title = 'Update Hotels: ' . ' ' . $model->HotelID;
$this->params['breadcrumbs'][] = ['label' => 'Hotels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->HotelID, 'url' => ['view', 'id' => $model->HotelID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hotels-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
