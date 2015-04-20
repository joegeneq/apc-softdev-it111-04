<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icon.png">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                
                'brandLabel' => '<img src="images/logo.png">',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
            	['label' => '<span class="glyphicon glyphicon-home"></span>', 'url' => ['/site/index']],
                ['label' => 'Appointment', 'url' => ['/appointment/index']],
            	['label' => 'Travel & Tour', 'url' => ['/travel-tour-arrangement/index']],
           		['label' => 'Tour Arrangement', 'url' => ['/tour-arrangement/index']],
            	['label' => 'Users', 'url' => ['/user/index']],
            	
            ];
			
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {

                $menuItems[] = [
                    'label' => '<span class="glyphicon glyphicon-user" font="arial"></span>'.' '.Yii::$app->user->identity->username,
                    'items' => [
                        ['label' => '<span class="glyphicon glyphicon-log-out" style="margin-right: 10px;"></span>'.'Log out', 
                                'url' => ['/site/logout'],
                                'linkOptions' => ['data-method' => 'post'], ],
                            ],
                        ];  

				echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
                'encodeLabels' => false,
            ]);
           
            }
			
			 NavBar::end();
            
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
        </div>
    </div>

    

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; Journeys & More Global Tours and Consultation Co. <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
