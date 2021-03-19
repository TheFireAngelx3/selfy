<?php
namespace backend\config;

use backend\abstracts\Singleton;
use backend\exceptions\DBException;
use backend\exceptions\LoginException;
use backend\models\User;

class DB extends Singleton
{
    private $dbServer = 'localhost';
    private $dbPort = '3306';
    private $dbUser = 'user';
    private $dbPw = 'PASSWORD';
    private $dbName = 'selfy';
    private $connected = false;
    private \PDO $db;

    public function __construct()
    {
        if(!$this->connected){
            $this->connectDB();
        }
    }

    private function connectDB(){
        try {
            $this->db = new \PDO('mysql:host='.$this->dbServer.';dbname='.$this->dbName, $this->dbUser, $this->dbPw);
            $this->connected = true;
        }catch (\PDOException $e){
            throw new DBException("ERROR: Could not connect. " . $e->getMessage(), 503);
        }

    }

    // ToDo : Passwort nicht in der Session speichern!
    public function checkLoginUser($username, $password){
        $prepare = $this->db->prepare("SELECT * FROM User WHERE username = :username AND password = :password");
        $prepare->bindParam(':username', $username);
        $prepare->bindParam(':password', $password);
        $prepare->execute();
        $data = $prepare->fetch();

        if($data == false){
            throw new LoginException('Benutzername/Passwort stimmen nicht!');
        }

        return true;
    }

//    public function checkUsernameExists(){
//        $prepare = $this->db->prepare("SELECT * FROM User WHERE username = :username");
//        $prepare->bindParam(':username', $username);
//
//        $prepare->execute();
//        $data = $prepare->fetch();
//
//        return $data != false;
//    }
}
