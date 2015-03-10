<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Inclusion */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Inclusion',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inclusions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inclusion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
