<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TravelTourArrangement */

$this->title = Yii::t('app', 'Create Arrangement', [
    'modelClass' => 'Travel Tour Arrangement',
]);
$this->params['breadcrumbs'][] = ['label' => 'Travel Arrangements', 'url' => ['index']];

?>

<div class="travel-tour-arrangement-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
