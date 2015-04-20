<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

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
                ['label' => 'Visa Assistance', 'url' => ['/appointment/create']],
            	['label' => 'Contact Us', 'url' => ['/site/contact']],
            ];

            if (Yii::$app->user->isGuest) {
            	$menuItems[] = ['label' => 'Travel Arrangement', 'url' => ['/travel-tour-arrangement/create']];
            	
                $menuItems[] = [
                    'label' => '<span class="glyphicon glyphicon-user" font="arial"></span>'.' Account',
                    'items' => [
                        ['label' => '<span class="glyphicon glyphicon-log-in" style="margin-right: 10px;"></span>'.'Login', 
                                'url' => ['/site/login'], ],
                        ['label' => '<span style="margin-right: 25px;"></span>'.'Signup', 
                                'url' => ['/site/signup'], ],
                            ],
                        ];

            } else {
            	$menuItems[] = ['label' => 'Tour Arrangement', 'url' => ['/tour-arrangement/create']];
            	$menuItems[] = ['label' => 'Travel and Tour', 'url' => ['/travel-tour-arrangement/create']];
            	
                $menuItems[] = [
                    'label' => '<span class="glyphicon glyphicon-user" font="arial"></span>'.' '.Yii::$app->user->identity->username,
                    'items' => [
                        ['label' => '<span class="glyphicon glyphicon-log-out" style="margin-right: 10px;"></span>'.'Log out', 
                                'url' => ['/site/logout'],
                                'linkOptions' => ['data-method' => 'post'], ],
                            ],
                        ];                 
            }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
                'encodeLabels' => false,
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <!-- <div class="content"> -->
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            <!-- </div> -->
        </div>
    </div>
    
    <script type="text/javascript" data-cfasync="false">(function () { var done = false;var script = document.createElement('script');script.async = true;script.type = 'text/javascript';script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript';document.getElementsByTagName('HEAD').item(0).appendChild(script);script.onreadystatechange = script.onload = function (e) {if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {var w = new PCWidget({ c: '9d1c0a1b-c485-4144-a893-dfb1acd3e338', f: true });done = true;}};})();</script>
    
    <?php $this->endBody() ?>   

</body>

    <?php include('footer.php'); ?>

</html>
<?php $this->endPage() ?>
