<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Airlines */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Airlines',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Airlines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="airlines-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
