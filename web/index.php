<?php
use backend\services\RouterService;
use backend\services\ViewService;
use backend\models\Request;

function __autoload($class){
    $path = $_SERVER['DOCUMENT_ROOT'].'\\..\\';
    $class = $path.str_replace('\\', '/', $class) . '.php';
	require_once($class);
}

/**
 * globale Methode vom ViewService, welche die Variablen zur Verfügung stellt
 */
function get($argument){
    echo ViewService::get($argument);
}

$request = new Request();
$router = RouterService::getInstance()->handle($request);
