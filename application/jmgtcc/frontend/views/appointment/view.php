<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Appointment */

$this->title = $model->appointment_code;

if (Yii::$app->user->isGuest == false)
{
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appointments'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->appointment_code];
}

?>
<div class="appointment-view">

    <?php
        if (Yii::$app->user->isGuest)
        {
            print('<br><br>');
            
            if (Yii::$app->session->hasFlash('appointmentNotif'))
            {
                print('<div class="alert alert-success">
                        <span class="glyphicon glyphicon-ok" style="font:arial; margin: 0 30px 0 30px"></span>'
                        .Yii::$app->session->getFlash('appointmentNotif').
                        '</div>');
            }
        }
        else
        {
            if (Yii::$app->session->hasFlash('appointmentNotif'))
            {
                print('<div class="alert alert-success">
                        <span class="glyphicon glyphicon-ok" style="font:arial; margin: 0 30px 0 30px"></span>'
                        .Yii::$app->session->getFlash('appointmentNotif').
                        '</div>');
            }
        }
    ?>

    <div class="row">

        <div class="col-lg-6">
            <div class="va-main">
                <div class="va-form">
                    <div class="va-header">
                        <img class="va-img"src="images\logo.png">
                        <b class="va-hdr-label">
                            <?= $model->appointment_code ?>
                        </b>
                    </div>
                    <div class="va-hdr-address">
                        Upper Ground 12 Cityland Pioneer Condominium 128 Pioneer St., <br>
                        Mandaluyong City, Philippines
                    </div>
                    <div class="va-details">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'appointment_date',
                                'appointment_time',
                                'country',
                                'visa_type',
                                'client_name',
                                'city',
                                'contact_number',
                                'email_address:email',                                
                                'notes:ntext'
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="va-main">

                <?php 

                    if ($model->status == 'Cancelled')
                    {
                        print('
                                <div class="alert alert-warning">
                                    <span class="glyphicon glyphicon-remove" style="font:arial; margin: 0 30px 0 30px"></span>
                                    This Appointment has been cancelled.
                                </div>
                            '); 
                    } ?>

                <div class="policy-hdr">Important Reminders:</div>
                <hr class="carved">
                <br>

                <ul>
                    <li class="policy-details">Please be at the JMGTCC Office <b>15 minutes</b> before your appointment time.</li>
                    <li class="policy-details">An email will be sent to your email address for reference.</li>
                    <li class="policy-details">Please print this page or the document attached on the email.</li>
                    <li class="policy-details">Clients without the printed appointment form will not be entertained.</li>
                <br>
                    <li class="policy-details">For questions or concerns, you may email <i>inquiry@journeysglobaltours.com</i> or set a live session with our technical Support Team.</li>
                </ul>

                <br>

                <div class="policy-ftr">Thank you for using JMGTCC Travel Arrangement & Appointment System!</div>

            </div>
        </div>
    

    </div>

    <br>

</div>
