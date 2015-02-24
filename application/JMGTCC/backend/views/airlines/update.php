<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Airlines */

$this->title = 'Update Airlines: ' . ' ' . $model->AirlineID;
$this->params['breadcrumbs'][] = ['label' => 'Airlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->AirlineID, 'url' => ['view', 'id' => $model->AirlineID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="airlines-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
