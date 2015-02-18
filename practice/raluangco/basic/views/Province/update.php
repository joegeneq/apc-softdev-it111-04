<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Province */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Province',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Provinces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'region_id' => $model->region_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="province-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
