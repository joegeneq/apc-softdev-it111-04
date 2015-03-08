<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
?>
<div class="site-login">

     <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
      
    <div class="login-form-main">
       <div class="login-form">
            <div class="login-form-form">               

                <?= $form->field($model, 'username')
                        ->label(false) 
                        ->textInput(['placeholder' => 'Username'])
                    ?>

                <?= $form->field($model, 'password')
                        ->passwordInput(['placeholder' => 'Password'])
                        ->label(false) ?> 
                
                <?= $form->field($model, 'rememberMe')->checkbox() ?>               
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
                        <?php ActiveForm::end(); ?>
                <br>

            </div>
        </div>
    </div>
   
</div>
