<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Accommodation */

$this->title = 'Update Accommodation: ' . ' ' . $model->AccommodationID;
$this->params['breadcrumbs'][] = ['label' => 'Accommodations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->AccommodationID, 'url' => ['view', 'id' => $model->AccommodationID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="accommodation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
