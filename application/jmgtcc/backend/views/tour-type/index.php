<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TourTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'JMGTCC ADMIN');
$this->params['breadcrumbs'][] = 'Tour Types';
?>
<div class="tour-type-index">

    <div class="index-hdr">
        <h3> Tour Type </h3>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a(Yii::t('app', 'Create new record', [
                'modelClass' => 'Tour Type',
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
                'tour_name',
                //'tour_description:ntext',

                [
                    'attribute' =>  'tour_description',
                    'value' =>  'tour_description',
                    'options'=> ['class'=>'width-60'],
                    'filter' => false,
                    
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        </div>

</div>
