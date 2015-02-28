<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mycomment */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Mycomment',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mycomments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mycomment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
