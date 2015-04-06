<?php
use yii\helpers\Html;
use common\models\User;
use frontend\controllers\ChatController;

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>This is the About page. You may modify the following file to customize its content:</p>
	<?=ChatWidget::widget();?>
    <code><?= __FILE__ ?></code>
</div>
