<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=sr',
            'username' => 'sr',
            'password' => 'sr',
            'charset' => 'utf8',
        ],  
        'urlManager' => [ 
            'enablePrettyUrl' => true, 
            'showScriptName' => false,
             'rules' => [             
                '<controller:(holidays|comment)>/<action:(update|delete)>/<id:\d+>/' => '<controller>/<action>',
                '<controller:(holidays|comment)>/<action:(index|create)>/' => '<controller>/<action>',
                '<controller:(holidays|comment)>/<slug:[a-z0-9-_]+>' => '<controller>/view',
                '<module:\w+>/<controller:\w+>/<action:(\w|-)+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:(\w|-)+>/<id:\d+>' => '<module>/<controller>/<action>',
            ]
        ],
       'authManager' => [
          'class' => 'yii\rbac\DbManager',
        ], 
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'long',
            'datetimeFormat' => 'long',        
            'defaultTimeZone' => 'Europe/Moscow',
            'timeZone' => 'Europe/Moscow'
        ],             
    ],
    'language'=>'ru-RU',
    'aliases' => [
        '@frontweb' => 'http://sr', // ссылка на веб страницу фронта
    ],
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
    ],  
    'controllerMap' => [
        'sort' => [
                    'class' => 'arogachev\sortable\controllers\SortController',
                ],
    ],  
];
