<?php


use yii\helpers\Html;
use common\models\User;


/* @var $this yii\web\View */
/* @var $model frontend\models\TravelTourArrangement */

$this->title = Yii::t('app', 'Create Arrangement', [
    'modelClass' => 'Travel Tour Arrangement',
]);

if (Yii::$app->user->isGuest == false)
{
    $this->params['breadcrumbs'][] = ['label' => 'Travel Arrangements', 'url' => ['index']];
}
?>

<div class="travel-tour-arrangement-create">

	<?php 
        if (Yii::$app->user->isGuest)
        {
            //return $this->goHome();
            Yii::$app->response->redirect(['site/login']);
        }
        else
        { ?>

    		<?=$this->render('_form', [
    				'model' => $model,
    		]) ?>
            
    <?php } ?>

   
</div>
