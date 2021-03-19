<?php
namespace backend\controllers;

use backend\exceptions\LoginException;
use backend\models\Request;
use backend\services\LoginService;
use backend\services\SessionService;
use backend\services\ViewService;

class LoginController
{
    private LoginService $loginService;

    public function __construct(){
        $this->loginService = LoginService::getInstance();
    }

    public function handle(Request $request){
        if($request->getType() === 'POST'){
            if($validate = $this->loginService->validate($request->getBodyParam('username'), $request->getBodyParam('password'))){

                return ViewService::getInstance()->renderTemplate('pages/homepage.php');
            }
        }elseif($request->getType() === 'GET'){
            return ViewService::getInstance()->renderTemplate('login.php');
        }

    }
}
