<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FoodDeals */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Food Deals',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Food Deals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-deals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
