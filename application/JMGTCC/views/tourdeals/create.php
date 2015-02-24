<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TourDeals */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Tour Deals',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tour Deals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-deals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
