<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\AppointmentReport;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'JMGTCC ADMIN');
$this->params['breadcrumbs'][] = 'Appointments';

?>

<script type="text/javascript">

	function showContent()
	{
		document.getElementById('reportContent').style.display = 'block';
		document.getElementById('reportBtn').style.display = 'none';
	}

	function hideContent()
	{
		document.getElementById('reportContent').style.display = 'none';
		document.getElementById('reportBtn').style.display = 'block';
	}

</script>

<div class="appointment-index">
  
    <h2> Visa Assistance Appointments </h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php 
	    if (Yii::$app->session->hasFlash('notif'))
	    {
	    	print('<div class="alert alert-success">
                        <span class="glyphicon glyphicon-ok" style="font:arial; margin: 0 30px 0 30px"></span>'
                        .Yii::$app->session->getFlash('notif').
                        '</div>');
	    }
	?>

	<br>

	<div id="reportHdr">
		<div class="row">
			<div class="col-lg-3">
				<h4> Send Visa Assistance Report </h4>
			</div>
			<div class="col-lg-3" id="reportBtn">
				<button class="btn btn-success" onclick="showContent()">
					<span class="glyphicon glyphicon-stats"></span> Generate report
				</button>
			</div>
		</div>
	</div>


	<div id="reportContent" style="display: none">  

		<br>

		<?php $form = ActiveForm::begin(); ?>		

			<div class="reportContent">

				<p>Select the date range of the confirmed appointments that you want to send.</p>
				<br>				

    			<div class="row">
					<div class="col-lg-1">
						<p class="form-label required-field">From</p></div>
					<div class="col-lg-5">
							<?= 
							 	$form->field($model, 'fromDate')
							        ->widget(
					                    DatePicker::className(), [
					                    'inline' => false, 
					                    'clientOptions' => [
					                    'autoclose' => true,
					                    'format' => 'yyyy-mm-dd',                               
					                    ]])
							        ->label(false); ?>
					</div>
				
					<div class="col-lg-1">
						<p class="form-label required-field">To</p></div>
					<div class="col-lg-5">
						<?=			 	
						 	$form->field($model, 'toDate')
						 		->widget(
					 				DatePicker::className(), [
					 				'inline' => false,
					 				'clientOptions' => [
					 						'autoclose' => true,
					 						'format' => 'yyyy-mm-dd',
					 				]])
						 		->label(false);?>
					</div>

					<div class="reportSubmit">								
						<?= Html::submitButton('<span class="glyphicon glyphicon-envelope" 
												style="font: arial;"></span>'.'  Submit report', ['class'=>'btn btn-success']);?> 
						<button class="btn btn-danger" onclick="hideContent()">Cancel</button>	
					</div>
	    		</div>
			</div>	
		<?php ActiveForm::end(); ?> 
	</div>


    <div class="body-content">

        <div class="row">     
	    	<div class="list-appointment">                    
	                             
				    <?=
				   		 GridView::widget([
				        'dataProvider' => $dataProvider,
				        'filterModel' => $searchModel,
				        'columns' => [
				            ['class' => 'yii\grid\SerialColumn'],
				
				            'appointment_code',
				            'client_name',

				            [
				            	'attribute' => 'appointment_date',
				                'value' => 'appointment_date',
				                'options'=> ['class'=>'width-20'],
				                'format' => 'raw',
				                'filter' => DatePicker::widget([
				                    'model' => $searchModel,
				                    'attribute' => 'appointment_date',
				                        'clientOptions' => [
				                            'autoclose' => true,
				                            'format' => 'yyyy-mm-dd',
				                        ]
				                ]),
				            ],

				            //'appointment_date',
				
				            [
				                'attribute'=>'appointment_time',
				                'value'=>'time.time'
				            ],
				
				            'status',			
				
				            [
				            'class' => 'yii\grid\ActionColumn',
				            'template' => '{view} {update}',
				
				            ],
				        ],
				    ]); ?>
				    
			</div>			
        </div>
	</div>
</div>


