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
	    /* $this->render('_form', [
	        'model' => $model,
	    ])  */
    
    	if (Yii::$app->user->isGuest)
    	{
    		print('<a href="/jmgtcc/frontend/web/index.php?r=site%2Flogin">
                            <img style="margin-top:5%;" class="servicesImg" title="Create a Travel Arrangement"
                            src="images/customised-travel-arrangements-journeys.jpg" /></a>  ');
    		
    	}
    	else 
    
    	{ ?>
    		<?=$this->render('_form', [
    				'model' => $model,
    		])?>
    	<?php } ?>
    
   

</div>
