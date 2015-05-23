<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

return [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'app\commands',
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
    'targets' => [
        [
            'class' => 'yii\log\FileTarget',
            'levels' => ['error', 'warning'],
        ],
        [
            'class' => 'yii\log\FileTarget',
            'levels' => ['info'],
            'categories' => ['orders'],
            'logFile' => '@app/runtime/logs/Orders/requests.log',
            'maxFileSize' => 1024 * 2,
            'maxLogFiles' => 20,
        ],
        [
            'class' => 'yii\log\FileTarget',
            'levels' => ['info'],
            'categories' => ['pushNotifications'],
            'logFile' => '@app/runtime/logs/Orders/notification.log',
            'maxFileSize' => 1024 * 2,
            'maxLogFiles' => 50,
        ],
    ],
        ],
        'db' => $db,
    ],
    'params' => $params,
];
