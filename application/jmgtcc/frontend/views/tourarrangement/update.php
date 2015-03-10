<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TourArrangement */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tour Arrangement',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tour Arrangements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'hotels_id' => $model->hotels_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tour-arrangement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>