<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Freebies */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Freebies',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Freebies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="freebies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
