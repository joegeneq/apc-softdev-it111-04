<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Deals */

$this->title = $model->DealID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Deals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deals-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->DealID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->DealID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'DealID',
            'Deal',
            'Description:ntext',
        ],
    ]) ?>

</div>
