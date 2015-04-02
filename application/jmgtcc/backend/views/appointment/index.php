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

    <div class="body-content">

        <div class="row">     
	    	<div class="list-appointment col-lg-9">                    
	                             
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
			<div class="col-lg-3">
                <div class="side-navigator">
                 <h4 class="v-report">
                 <span>Select the date range of the confirmed appointments that you want to send.</span>
                 Send Visa Assistance Report
                 </h4>
				    <br>
				    <?php 
				    	//Notification
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
				             ->label('FROM'); ?>
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
				     		  ->label('TO');?>
				     
				    <center><?= Html::submitButton('Send', ['class'=>'btn btn-success']);?></center> 
				    <?php ActiveForm::end(); ?>     
				</div>                
        	</div>
        </div>
</div>


