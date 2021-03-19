<?php
namespace backend\services;

use backend\controllers\ErrorController;
use backend\controllers\LoginController;

class ConfigService
{
    const LOCALE = 'de';

    const ROUTES = [
        '/login' => [
            'class' => LoginController::class,
            'method' => 'handle'
        ],
        '/' => [
            'class' => '',
            'method' => ''
        ],
        '/404' => [
            'class' => ErrorController::class,
            'method' => 'handle'
        ],
        '/503' => [
            'class' => ErrorController::class,
            'method' => 'handle'
        ],
    ];

    public function getLocale(){
        return self::LOCALE;
    }
}
