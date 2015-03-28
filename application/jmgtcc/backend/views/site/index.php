<?php
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Appointment;
use backend\models\AppointmentSearch;

$this->title = 'JMGTCC Backend';
$searchModel = new AppointmentSearch();
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

?>
<div class="site-index">

    <div class="body-content">

        <div class="row">

            <div class="side-navigator col-lg-3">
            
                <h3>Maintenance Menus</h3>
                <ul>
                    <li><a href="index.php?r=airlines">Airlines</a></li>
                    <li><a href="index.php?r=fooddeals">Food Deals</a></li>   
                    <li><a href="index.php?r=freebies">Freebies</a></li>
                    <li><a href="index.php?r=time">Time</a></li>   
                    <li><a href="index.php?r=tourtype">Tour Type</a></li>    
                    <li><a href="index.php?r=transportservice">Transport Service</a></li>       
                </ul>
            </div>
           
           
                <div class="cal-appointment col-lg-9">
                    <h3>Scheduled Appointments</h3>
                   
                     <?= GridView::widget([
       					 'dataProvider' => $dataProvider,
       					 //'filterModel' => $searchModel,
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


                        /*  [
				            'class' => 'yii\grid\ActionColumn',
				            'template' => '{view} {update} {delete}',
				
				            ], */
				        ],
    					]); ?>
                     
             </div>
        </div>
    </div>
</div>
