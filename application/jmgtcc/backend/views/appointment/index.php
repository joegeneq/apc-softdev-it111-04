<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\AppointmentReport;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Appointments');

?>
<div class="appointment-index">

    <br>

    <h2> Visa Assistance Appointments </h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <br>
    <?php 
    
    if (Yii::$app->session->hasFlash('success'))
    {
    	echo Yii::$app->session->getFlash('success');
    }
    
    ?>
    <?php $form = ActiveForm::begin(); ?>
    <?= 
     	//From Date
     	$form->field($model, 'fromDate')
                             ->widget(
                                  DatePicker::className(), [
                                   'inline' => false, 
                                   'clientOptions' => [
                                   'autoclose' => true,
                                   'format' => 'yyyy-mm-dd',                               
                                  ]])
                             ->label(false); ?>
     	<?=
     	//To Date
     	$form->field($model, 'toDate')
     		 ->widget(
     				DatePicker::className(), [
     				'inline' => false,
     				'clientOptions' => [
     						'autoclose' => true,
     						'format' => 'yyyy-mm-dd',
     				]])
     		  ->label(false);?>
     
     	<?= Html::submitButton('Submit', ['class'=>'btn btn-success']);?>
    
    
    <?php //ActiveForm::end(); ?>                         
                             
    <?=
   		 GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'appointment_code',
            'client_name',
            'appointment_date',

            [
                'attribute'=>'appointment_time',
                'value'=>'time.description'
            ],

            'status',


            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',

            ],
        ],
    ]); ?>

</div>


