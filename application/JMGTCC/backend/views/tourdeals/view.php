<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TourDeals */

$this->title = $model->DealID;
$this->params['breadcrumbs'][] = ['label' => 'Tour Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-deals-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->DealID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->DealID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'DealID',
            'DealName',
            'DealDescription:ntext',
        ],
    ]) ?>

</div>
