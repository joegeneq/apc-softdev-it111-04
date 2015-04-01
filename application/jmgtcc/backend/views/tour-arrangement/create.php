<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TourArrangement */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Tour Arrangement',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tour Arrangements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-arrangement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
