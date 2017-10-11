<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '4qpfPDMUQrraWnzUr0MKjzuujB9v--wj',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
			'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            '<controller:\w+>/<id:\d+>' => '<controller>/view',
            ],
        ],
        
    ],
    'params' => $params,
	//Added for user/dectrium
	'modules' => [
		'user' => [
			'class' => 'dektrium\user\Module',
		],
		'rbac' => 'dektrium\rbac\RbacWebModule',
		'gridview' => [
			'class' => 'kartik\grid\Module',
		],
		'datecontrol' =>  [
			'class' => 'kartik\datecontrol\Module',

			// format settings for displaying each date attribute
			'displaySettings' => [
				'date' => 'd-m-Y',
				'time' => 'H:i:s A',
				'datetime' => 'd-m-Y H:i:s A',
			],

			// format settings for saving each date attribute
			'saveSettings' => [
				'date' => 'Y-m-d', 
				'time' => 'H:i:s',
				'datetime' => 'Y-m-d H:i:s',
			],



			// automatically use kartik\widgets for each of the above formats
			'autoWidget' => true,

		]
	],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
	$config['modules']['gii']['generators'] = [
        'kartikgii-crud' => ['class' => 'warrence\kartikgii\crud\Generator'],
    ];
}

return $config;
