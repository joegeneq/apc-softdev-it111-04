<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FoodDeals */

$this->title = 'JMGTCC ADMIN';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Food Deals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->food_deal_name;
?>
<div class="food-deals-view">

    <br>

    <div class="view-maintenance">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'food_deal_name',
                'food_deal_description:ntext',
            ],
        ]) ?>
    </div>

    <div class="maintenance-btn">
        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>   

</div>
