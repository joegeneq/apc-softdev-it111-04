<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Airlines */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Airlines',
]) . ' ' . $model->AirlineID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Airlines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->AirlineID, 'url' => ['view', 'id' => $model->AirlineID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="airlines-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
