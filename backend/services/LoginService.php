<?php
namespace backend\services;

use backend\abstracts\Singleton;
use backend\config\DB;
use backend\models\User;

class LoginService extends Singleton
{
    public function validate(string $username, string $password){
        if($username != '' && $password != ''){
            return DB::getInstance()->checkLoginUser($username, $password);
        }

        return false;
    }
}
