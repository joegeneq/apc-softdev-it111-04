<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
<<<<<<< HEAD
=======
	 'db'=>[
            'class'=>'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=jmgtcc_tas',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8'            
        ],
>>>>>>> 095ef49243b24b8f60bab00b882c29f0c1c253bf
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
			//'identityCookie' => [
			//'name' => '_backendUser', // unique for backend
			//'path'=>'/advanced/backend/web'  // correct path for the backend app.
				//]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
