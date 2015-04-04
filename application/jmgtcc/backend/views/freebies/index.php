<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FreebiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'JMGTCC ADMIN');
$this->params['breadcrumbs'][] = 'Freebies';
?>
<div class="freebies-index">

    <div class="index-hdr">
        <h3> Freebies </h3>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a(Yii::t('app', 'Create new record', [
                'modelClass' => 'Freebies',
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
                'freebies_name',
                //'freebies_description:ntext',

                [
                    'attribute' =>  'freebies_description',
                    'value' =>  'freebies_description',
                    'options'=> ['class'=>'width-60'],
                    'filter' => false,                    
                ],


                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        </div>

    
</div>
