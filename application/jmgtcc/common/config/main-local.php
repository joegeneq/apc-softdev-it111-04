<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=jmgtcc_brs',
            'username' => 'jmgtcc_brs',
            'password' => 'jmgtcc_brs',
            'charset' => 'utf8',
        ],
    	'user' => [
    		'identityClass' => 'app\models\User',
    		'enableAutoLogin' => false,
    		'enableSession' => true,
    		'authTimeout' => 900,
    		'loginUrl' => ['site/login'],
    	],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],

    ],
];
