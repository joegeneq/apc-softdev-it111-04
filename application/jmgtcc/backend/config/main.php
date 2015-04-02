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
	
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
			'identityCookie' => [
			'name' => '_backendUser', 
			'path'=>'/advanced/backend/web' 
			]
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
    	'mailer' => [
    		'class' => 'yii\swiftmailer\Mailer',
    		'useFileTransport' => false,
    		'transport' => [
    						'class' => 'Swift_SmtpTransport',
    						'host' => 'smtp.gmail.com',
    						'username' => 'dummysender1@gmail.com',
    						'password' => '//dummy12',
    						'port' => '587',
    						'encryption' => 'tls',
    					],
    	],
    ],
    'params' => $params,
];
