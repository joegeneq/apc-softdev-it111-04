<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Airlines */

$this->title = 'Create Airlines';
$this->params['breadcrumbs'][] = ['label' => 'Airlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="airlines-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
