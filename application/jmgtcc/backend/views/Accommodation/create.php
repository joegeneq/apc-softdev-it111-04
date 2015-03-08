<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Accommodation */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Accommodation',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accommodations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accommodation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
