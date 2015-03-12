<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Freebies */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Freebies',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Freebies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freebies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
