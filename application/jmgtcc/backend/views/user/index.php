<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'JMGTCC ADMIN');
$this->params['breadcrumbs'][] = 'Users';
?>
<div class="user-index">

    <h2> Registered Clients </h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            'first_name',
            'last_name',

            //'gender',

            [
                'attribute' => 'gender',
                'value' => 'gender',
                'options'=> ['class'=>'width-10'],
            ],

            // 'city',
            // 'contact_number',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
             'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'last_logged_in',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>

</div>
