<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Time */

$this->title = 'JMGTCC ADMIN';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Times'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="time-view">

    <br>

    <div class="view-maintenance">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'time',
                'description',
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
