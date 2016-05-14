<?php

$config = [
    'id' => 'ranking',
    'name' => 'Ranking',
    'basePath' => dirname(__DIR__),
    'params' => require(__DIR__ . '/params.php'),
    'language' => 'pt-BR',
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'cookieValidationKey' => '8J80m98mgqnqg67t3gf3bc7qfbx6',
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
            'useFileTransport' => YII_DEBUG ? true : false,
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'partidas/<jogo_id:\d+>/<jogador_id:\d+>' => 'site/partidas',
            ]
        ]
    ],
];

if (YII_ENV_DEV)
{
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

\Yii::$container->set('yii\grid\ActionColumn', [
    'contentOptions' => ['width' => '70px;'],
]);

return $config;
