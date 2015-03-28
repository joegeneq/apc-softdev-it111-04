<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TravelTourArrangement */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Travel Tour Arrangement',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Travel Tour Arrangements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="travel-tour-arrangement-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
