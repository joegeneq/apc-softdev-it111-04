<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TourArrangement */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Tour Arrangement',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tour Arrangements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-arrangement-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
