<?php

use developeruz\db_rbac\behaviors\AccessBehavior;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
     'as AccessBehavior' => [
        'class' => AccessBehavior::className(),
        'rules' =>
            ['site' =>
                [
                    [
                        'actions' => ['login','error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index','logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'permit/access' =>
                [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'permit/user' =>
                [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'yii2images/images' =>
                [
                    [
                        'allow' => true,
                    ],
                ],
                'debug/default' =>
                [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'sort' =>
                [
                    [
                        'allow' => true,
                    ],
                ],
            ]       
    ],
    'id' => 'app-backend',    
    'name' => 'СЛУЖУ РОССИИ!',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok 
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => '@frontend/web/images/store', //path to origin images
            'imagesCachePath' => '@frontend/web/images/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick' 
            'placeHolderPath' => '@webroot/images/placeHolder.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
        ],
        'permit' => [
            'class' => 'developeruz\db_rbac\Yii2DbRbac',
            'params' => [
                'userClass' => 'common\models\User'
            ]
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
