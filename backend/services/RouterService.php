<?php
namespace backend\services;

use backend\abstracts\AbstractException;
use backend\abstracts\Singleton;
use backend\exceptions\NotFoundException;
use backend\models\Request;

class RouterService extends Singleton
{
    public function handle(Request $request){
        $path = $request->getPath();

        try {
            if (!SessionService::isLoggedIn()){
                $path = '/login';
            }

            if($this->getController($path) != null){
                $class = $this->getController($path);
                $controller = new $class;
                call_user_func([$controller, ($this->getControllerMethod($path))], $request);
            }else{
                throw new NotFoundException('Folgender Pfad konnte nicht aufgelöst werden: '. $path);
            }

        }catch (AbstractException $e){
            http_response_code($e->getCode());
            ViewService::getInstance()->renderTemplate($e->getTemplate(), $e->getMessage());
        }
    }

    private function getController(string $path){
        return ConfigService::ROUTES[$path]['class'];
    }

    private function getControllerMethod(string $path){
        return ConfigService::ROUTES[$path]['method'];
    }
}
