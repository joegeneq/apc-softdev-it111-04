<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\region */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Region',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>