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
                    ?>

                <?= $form->field($model, 'password')
                        ->passwordInput() 
                    ?> 

                <br>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
                        <?php ActiveForm::end(); ?>
                <br>

            </div>
        </div>
    </div>
           
</div>
