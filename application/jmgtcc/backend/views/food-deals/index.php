<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FoodDealsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'JMGTCC ADMIN');
$this->params['breadcrumbs'][] = 'Food Deals';
?>
<div class="food-deals-index">

    <div class="index-hdr">
        <h3> Food deals </h3>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a(Yii::t('app', 'Create new record', [
                'modelClass' => 'Food Deals',
            ]), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="index-maintenance">   

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                'food_deal_name',
                //'food_deal_description:ntext',

                [
                    'attribute' =>  'food_deal_description',
                    'value' =>  'food_deal_description',
                    'options'=> ['class'=>'width-60'],
                    'filter' => false,                    
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        </div>

</div>
