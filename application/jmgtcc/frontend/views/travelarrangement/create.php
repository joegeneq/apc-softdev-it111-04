<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TravelArrangement */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Travel Arrangement',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Travel Arrangements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="travel-arrangement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
