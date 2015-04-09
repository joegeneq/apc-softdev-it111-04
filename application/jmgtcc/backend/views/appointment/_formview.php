<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Appointment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-form">

    <div class="row">
        <div class="col-lg-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [           
                    'appointment_code',
                    'client_name',
                    'city',
                    'contact_number',
                    'email_address:email',
                    'appointment_date',
                    'appointment_time',
                    'country',
                    'visa_type',
                    'date_created',
                    'notes:ntext'
                ],
            ]) ?>
        </div>

         <div class="col-lg-6">
             <?php $form = ActiveForm::begin(); ?>  

             <?php 
                if (($model->status) == 'Cancelled')
                {
                    print('
                        <div class="alert alert-warning">
                            <span class="glyphicon glyphicon-remove" style="font:arial; margin: 0 30px 0 30px"></span>
                            This Appointment is cancelled.
                        </div>
                    '); 
                } else if (($model->status) == 'Served')
                {
                     print('
                        <div class="alert alert-success">
                            <span class="glyphicon glyphicon-ok" style="font:arial; margin: 0 30px 0 30px"></span>
                            This Appointment has been served.
                        </div>
                    '); 
                }
               ?>

            <div class="row">
                <div class="col-lg-3">
                    <p class="form-label"><b>Status:</b></p>
                </div>

                <?php 
                    if (($model->status) == '') 
                    {
                        print('<div class="col-lg-4"> - </div>');
                    }
                    else
                    {
                        print('<div class="col-lg-4">'. $model->status . '</div>');
                    }
                ?>
                
            </div>

            <div class="row">
                
                <?php
                    if (($model->status) != 'Cancelled')
                    {
                        print('
                            <div class="col-lg-3">
                                <p class="form-label"><b>Approved by:</b></p>
                             </div>     
                            ');
                    } ?>                

                <?php 
                    if (($model->status) == 'Served') 
                    { 
                        print('<div class="col-lg-3">' . $model->confirmed_by . '</div>'); //Session
                    }
                    else if (($model->status) == '') 
                    {
                        print('<div class="col-lg-3"> - </div>');
                    }
                ?>

            </div>

            <br>

            <hr class="faded">

            <br>

            <div class="row">

                <?php
                    if (($model->status) == '') 
                    {
                        print('
                                <div class="col-lg-3">
                                    <p class="form-label"><b>Payment:</b></p>
                                 </div>
                                <div class="col-lg-8"> - </div>');
                    }     
                    else if (($model->status) == 'Served') 
                    {
                        print('
                                <div class="col-lg-3">
                                    <p class="form-label"><b>Payment:</b></p>
                                 </div>
                                <div class="col-lg-8">
                            '); ?>
                        <?= $form->field($model, 'payment_rate')->textInput(['readonly'=>'true'])
                            ->label(false)
                             ?>
                <?php 
                        print('</div>');
                    } 
                ?>

            </div>
            

            <br>

            <div class="form-group">
                    
                
                <div class="btn-right ">

                    <?php if (($model->status) != 'Served' &&  ($model->status) != 'Cancelled') { ?>
                    <?= Html::a('Set payment', ['update', 'id' => $model->id, 
                                'id' => $model->id], 
                                ['class' => 'btn btn-primary']) ?>
                    <?php } ?>    
                    
                </div> 
       

            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>


</div>
