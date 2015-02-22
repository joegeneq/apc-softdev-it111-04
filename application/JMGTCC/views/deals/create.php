<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Deals */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Deals',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Deals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
