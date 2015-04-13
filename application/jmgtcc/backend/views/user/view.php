<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'JMGTCC ADMIN';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->username;
?>
<div class="user-view">    

    <div class="view-maintenance">

        <h3><?php echo $model->username; ?></h3>

        <br>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                //'username',
                'first_name',
                'last_name',
                'gender',
                'city',
                'contact_number',
                //'auth_key',
                //'password_hash',
                //'password_reset_token',
                'email:email',
                //'status',
                //'created_at',
                //'updated_at',
                //'last_logged_in',
            ],
        ]) ?>

        <div class="maintenance-btn">
            <?php echo Html::a('Cancel', ['/user/index'], 
                                    ['class' => 'btn btn-danger']); ?>
        </div>
    </div>

</div>
