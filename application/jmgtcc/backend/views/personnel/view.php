<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Personnel */

$this->title = 'JMGTCC ADMIN';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personnels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnel-view">

    <br>

    <div class="view-maintenance">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'personnel_name',
                'email:email',
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
