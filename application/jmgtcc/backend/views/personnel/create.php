<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Personnel */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Personnel',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personnels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
