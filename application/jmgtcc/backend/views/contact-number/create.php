<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ContactNumber */

$this->title = 'JMGTCC ADMIN';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contact Numbers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-number-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
