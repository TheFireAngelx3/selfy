<?php
namespace backend\abstracts;

class Singleton
{
    protected static array $instances;

    public static function getInstance(){
        if(!isset(self::$instances[static::class])){
            self::$instances[static::class] = new static();
        }
        return self::$instances[static::class];
    }
}
