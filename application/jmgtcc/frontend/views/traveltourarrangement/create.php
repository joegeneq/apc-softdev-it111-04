<?php

use yii\helpers\Html;
use common\models\User;


/* @var $this yii\web\View */
/* @var $model frontend\models\TravelTourArrangement */

$this->title = Yii::t('app', 'Create Arrangement', [
    'modelClass' => 'Travel Tour Arrangement',
]);
$this->params['breadcrumbs'][] = ['label' => 'Travel Arrangements', 'url' => ['index']];

?>

<div class="travel-tour-arrangement-create">

    <?=
    $this->render('_form', [
        'model' => $model,
    ]) 
    
    	/* if (Yii::$app->user->identity->username != null)
    	{
    		$this->render('_form', [
        		'model' => $model,
   			]);
    	}
    	else
    	{
    		print('<a href="/jmgtcc/frontend/web/index.php?r=site%2Flogin">
                            <img class="servicesImg" title="Create a Travel Arrangement"
                            src="images/customised-travel-arrangements-journeys.jpg" /></a>  ');
    	} */
    
    ?>

</div>
