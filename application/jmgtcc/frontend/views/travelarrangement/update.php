<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TravelArrangement */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Travel Arrangement',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Travel Arrangements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'hotels_id' => $model->hotels_id, 'airlines_id' => $model->airlines_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="travel-arrangement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>