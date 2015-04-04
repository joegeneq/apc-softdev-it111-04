<?php
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Appointment;
use backend\models\AppointmentIndex;

$this->title = 'JMGTCC ADMIN';
$searchModel = new AppointmentIndex();
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

?>
<div class="site-index">

    <div class="body-content">

        <div class="row">

            <div class="col-lg-3">
                <div class="side-navigator">

                    <br>               
                        <a href="index.php?r=airlines">
                            <button class="side-nav">Airlines</button></a>
                    <br><a href="index.php?r=food-deals">
                            <button class="side-nav">Food Deals</button></a>   
                    <br><a href="index.php?r=freebies">
                            <button class="side-nav">Freebies</button></a>
                    <br><a href="index.php?r=time">
                            <button class="side-nav">Time</button></a>   
                    <br><a href="index.php?r=tour-type">
                            <button class="side-nav">Tour Type</button></a>    
                    <br><a href="index.php?r=transport-service">
                            <button class="side-nav">Transport Service</button></a> 
                    <br><a href="index.php?r=personnel">
                            <button class="side-nav">Personnel</button></a> 
                    <br><br>        
                
                </div>                
            </div>
           
           
                <div class="list-appointment col-lg-9">
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

            			 //'status',

                        //[
				            // 'class' => 'yii\grid\ActionColumn',
				            // 'template' => '{view}',
				
				            // ], 
				        ],
    					]); ?>
                     
             </div>
        </div>
    </div>
</div>
