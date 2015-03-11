<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TransportService */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Transport Service',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transport Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transport-service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
