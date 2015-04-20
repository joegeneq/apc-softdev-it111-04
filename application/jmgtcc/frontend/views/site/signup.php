<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Sign up';
?>
<div class="site-signup">    

    <div class="row">

        <div class="signup-form-main">

            <h3><?= Html::encode($this->title) ?></h3>
            <p>Please fill out the following fields to signup:</p>
            <br>

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>                
          
            <div class="row">
                 <div class="col-lg-5">
                    <?= $form->field($model, 'first_name') 
                            ->textinput(['placeholder'=>'First name']) 
                            ->label(false) ?>                               
                </div>
                <div class="col-lg-5">
                    <?= $form->field($model, 'last_name') 
                            ->textinput(['placeholder'=>'Last name']) 
                            ->label(false) ?>               
                </div>  
            </div>  
                       
            <div class="row">
                 <div class="col-lg-5">
                   <?= $form->field($model, 'username')
                        ->textinput(['placeholder'=>'Username']) 
                        ->label(false) ?>                         
                </div>   
            </div>  
            
             <div class="row">
             	<div class="col-lg-5">
                   <?= $form->field($model, 'password')
                        ->passwordInput(['placeholder'=>'Password']) 
                        ->label(false) ?>   
                </div>       
                <div class="col-lg-5">
                  <?= $form->field($model, 'confirmpassword')
                      ->passwordInput(['placeholder'=>'Confirm Password'])  
                      ->label(false)?>     
                 </div>      
             </div>  
        
            <div class="row">
                <div class="col-lg-5">
                    <div class="hrz-radiobtn">
                         <?= $form->field($model, 'gender')
                            ->radioList(array('M'=>'Male','F'=>'Female'))
                            ->label('Gender: ') ?>    
                    </div>                  
                </div>            
            </div>  

            <div class="row">
                <div class="col-lg-5">
                    <?= $form->field($model, 'city') 
                        ->textinput(['placeholder'=>'City']) 
                        ->label(false) ?>                     
                </div>               
            </div>  

            <div class="row">
                <div class="col-lg-5">
                    <?= $form->field($model, 'contact_number') 
                            ->textinput(['placeholder'=>'Contact number']) 
                            ->label(false) ?>            
                </div>
            </div>  

             <div class="row">
                <div class="col-lg-5">
                    <?= $form->field($model, 'email')
                            ->input('email')
                            ->textinput(['placeholder'=>'Gmail Address', 'pattern' => '[^]*@gmail\.com$']) 
                            ->label(false) ?> 
                </div>     
            </div>  
			<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
							'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
							]) ?>
         
             <div class="row">
                <div class="col-lg-5">
                    <div class="btn-right" style="padding-right:0%">
                        <?= Html::submitButton('Create Account', 
                            ['class' => 'btn btn-success', 
                                'name' => 'signup-button']) ?>
                    </div>
                </div>     
            </div> 

        </div>

        <div class="col-lg-5">                
            <?php ActiveForm::end(); ?>
        </div>

        <br>

    </div>
</div>
