<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language'=>'en',
    'sourceLanguage'=>'en',
    'modules' => [
        'gridview'=>[
            'class'=>'\kartik\grid\Module',
        ],
        'settings' => [
          'class' => 'backend\modules\settings\Settings',
        ],
    ],
    'components' => [
        'i18n'=>[
            'translations'=>[
                'app'=>[
                    //'class'=>'yii\i18n\PhpMessageSource',
                    'class'=>'yii\i18n\DbMessageSource',
                    //'basePath'=>'@app/messages',
                    'sourceLanguage'=>'en',
                    /*'fileMap'=>[
                        'app'=>'app.php',
                        'app/error'=>'error.php',
                    ],*/
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.live.com',
                'username' => 'k_ike1095@hotmail.com',
                'password' => 'kike12345',
                'port' => '25',
                'encryption' => 'tls',
                'streamOptions' => [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ],
            ],
        ],
            'authManager'=>
            [
                'class'=>'yii\rbac\DbManager',
                'defaultRoles'=>['guest'],
            ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'MyComponent'=>[
            'class'=>'backend\components\MyComponent',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'as beforeRequest'=>[
        'class'=>'backend\components\CheckIfLoggedIn',
    ],
    'params' => $params,
];
